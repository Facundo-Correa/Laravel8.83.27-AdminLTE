<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImportacionDbPOA extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sql:importPOA';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Obtener datos de las entidades del SQL Server';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set('max_execution_time', 600);
        ini_set('max_allowed_packet',500);
        ini_set('mysql.connect_timeout', 300);
        ini_set('default_socket_timeout', 300);
        ini_set('mysqli.reconnect',true);
        ini_set('wait_timeout',36000);
        
        $tablas_to_import = [
            // 'CCOB_CVCL', 'CCOB_CVCC', 'CCOB_CTEC', 'CCOB_VCTC',
            // 'CCOB_CLC1', 'CCOB_CLC2', 'CCOB_CLC3', 'CCOB_CLC4', 'CCOB_TCLI', 'CCOB_ACLI', 'SIST_PCIA', 'SIST_PAIS','CCOB_DCLI'
        ];

        foreach ($tablas_to_import as $tabla){
            Log::channel('sync')->info("----------------------------------------------------");
            Log::channel('sync')->info("Importarcion de tabla: ".$tabla);
            $rs_total_tabal = DB::connection('sqlsrv')->select('SELECT count(*) AS total FROM dbPOA.dbo.'.$tabla);
            $max = (int)env('CHUNK_SIZE',10000);
            DB::table(ucfirst($tabla))->truncate();
            Log::channel('sync')->info(" - Llenado de tabla temporal: ".$tabla);

            $total = $rs_total_tabal[0]->total;
            $pages = ceil($total / $max);
            $i = 1;
            for($y=0; $y <= $pages; $y++)
            {
                try {
                    $startTime = Carbon::parse(NOW());

                    $offset = (($y)  * $max);
                    $start = ($offset == 0 ? 0 : ($offset));

                    $this->sql_file = "Exportando registros desde\n";

                    $SQLTablas[$tabla] = DB::connection('sqlsrv')->select('SELECT * FROM dbPOA.dbo.'.$tabla.' ORDER BY (SELECT NULL AS NOORDER) OFFSET '. $start .' ROWS FETCH NEXT '. $max .' ROWS ONLY;');
                    
                    $renglon = "Exportando registros desde: ".$tabla. "\n";
                    
                    foreach ( $SQLTablas[$tabla] as $row)
                    {
                        $totalColumnas = count((array)$row);
                        $renglon .= $i.'|';
                        $j = 1;
                        foreach ($row as $key=>$valor)
                        {
                            if($j > $totalColumnas)
                                continue;

                            $renglon .= $this->sanitize($valor,$key).'|';
                        }
                        $renglon .= "\n";
                        $i++;
                    }
                    
                    //grabo archivo
                    $this->saveFile($renglon, $y, $tabla);
                    //Inserto registros
                    $this->insert($y, $tabla);

                } catch(\Exception $e) {
                    Log::channel('sync')->info($e);
                    return $e->getMessage();
                }

                
                $finishTime = Carbon::parse(NOW());
                $totalDuration = $finishTime->diffForHumans($startTime);
                echo 'Duracion vuelta: '.$totalDuration;

            }


            
            $finishTime = Carbon::parse(NOW());
            $totalDuration = $finishTime->diffForHumans($startTime);
            Log::channel('sync')->info(" - Fin de llenado de tabla: ".$tabla);
            Log::channel('sync')->info("Fin de importarcion de tabla: ".$tabla);
            Log::channel('sync')->info("----------------------------------------------------");

            //Zipeamos archivos creados
            $this->zipSql($tabla);

        }

        //Notificamos por mail
        //$this->notificar();
        
        Log::channel('sync')->info("Fin de importarcion de las tablas");
    }

    public function sanitize($valor, $key){
        if($valor > 0 ){
            $val = (int)$valor;
        }
        
        $val = preg_replace('/^$/','\N',$valor);
        $val = preg_replace('/\|/','',$val);
        $val = str_replace("\n", "\t", $val);
        $val = str_replace("\r", "\t", $val);

        if(preg_match('/fecha/',$key) && preg_match('/^$/',$valor))
        {
            // $val = '0000-00-00 00:00:00';
            $val = '\N';
        }

        return $val;
    }

    public function saveFile($row, $vuelta,$tabla){
        $file_name = $tabla.$vuelta.'.sql';
        Log::channel('sync')->info('Se cre archivo de exportación  '.$file_name);
        Log::channel('stderr')->info('Se cre archivo de exportación  '.$file_name);
        Storage::disk('import')->append($file_name, $row);
    }

    public function insert($vuelta, $tabla)
    {
        try {

            $file_salida = realpath('./'). env('STORE_IMPORT_SQL_FILES').$tabla.$vuelta.'.sql';
            $query_export = "LOAD DATA LOCAL INFILE '" . addslashes($file_salida) . "' REPLACE INTO TABLE " . strtolower($tabla). "
                          CHARACTER SET UTF8
                          FIELDS TERMINATED BY '|'
                          LINES TERMINATED BY '\n'  IGNORE 1 LINES";

            Log::channel('sync')->info('Ejecutando sentencia de inserción den dbOnline '.$query_export);
            Log::channel('stderr')->info('Ejecutando sentencia de inserción den dbOnline '.$query_export);

            $result = DB::connection('mysql')->getpdo()->exec($query_export);
            Log::channel('sync')->info('Se insertaron '.$result);
            Log::channel('stderr')->info('Se insertaron '.$result);



        } catch(\Exception $e){
            echo $query_export;
            Log::channel('stderr')->error($e->getMessage());
            Log::channel('sync')->error($e->getMessage());
        }
    }

    private function zipSql($nombre)
    {
        $date = Carbon::now()->format('Y-m-d_h-i');
        $files_to_zip = glob(realpath('./').env('STORE_IMPORT_SQL_FILES') . '*.sql');
        $totalQty = 0;
        $folder = realpath('./').env('STORE_IMPORT_SQL_FILES');

        //zipeamos archivos de importacion
        $zip = new \ZipArchive();
        $zip_file_name = 'importacionPOA'.$nombre.$date.'.zip';
        $zip->open($folder.$zip_file_name, \ZipArchive::CREATE);

        foreach($files_to_zip as $file)
        {
            // Add files from root directory to ZIP
            if (file_exists($file) && is_file($file))
            {
                $filename = substr($file, strlen($folder)-1);
                $zip->addFile($file,$filename);
                $filesToDelete[] = $file;
            }
        }
        $zip->close();
        foreach($filesToDelete as $files)
        {
            unlink($files);
        }
    }
}