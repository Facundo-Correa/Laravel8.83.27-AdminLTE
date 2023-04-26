<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Importacion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sql:import';

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
        // $tablas_to_import = ['canduenios', 'senias','apto_cria_apto','calendario','canes','catalogo_can','clasificacion_adiestramiento','clientes',
        // 'codigo_examen_extranjeros','colores','criaderos','cuotasimpagas','denuncia_nacimiento','denuncia_servicio','estructura_categoria',
        // 'estructura_categoria_peludo','examenes','examenes_codigos','examen_categorias','examen_extranjeros','examen_resultado_aptocria_can',
        // 'examen_resultado_cab2_can','examen_resultado_selecciones_can','examen_resultado_superior_can','examen_resul_dcf',
        // 'examen_resul_dcfcodo','figurantes','habilitantes','inscripcion_torneos','jueces','jueces_tipo_categoria',
        // 'juez_torneo','lugares','parametros_nros_del_sistema','pruebas_de_adiestramiento','radiologo',
        // 'reporte_tramites','resultados_adiestramiento','resultados_estructura','resultado_seleccion','r_poa_pla',
        // 'tatuador','tdbUsuarios','tipo_cliente','torneos','torneos_can','torneos_prueba','zonas', 'juez_categoria', 
        // 'tipoExamen'];
        //esto tarda 3 minutos
        $tablas_to_import = ['juez_categoria', 'tipoExamen'];
        //hacer count del SQL server y comparar con el count del MySQL de cada tabla
        //Si difiere, que tire un error/reproceso/alerta
        //hacer vista de script de cuotasimpagas
        foreach ($tablas_to_import as $tabla){
            Log::channel('sync')->info("----------------------------------------------------");
            Log::channel('sync')->info("Importarcion de tabla: ".$tabla);

            switch($tabla)
            {
                case 'canduenios':
                    $tabla = 'Can_Dueños';
                    break;
                case 'senias':
                    $tabla = 'Señas';
                    break;
                default: 
                $tabla = $tabla;
                break;

            }
            
            $rs_total_tabal = DB::connection('sqlsrv')->select('SELECT count(*) AS total FROM PoaCanes.dbo.'.$tabla);
            $max = (int)env('CHUNK_SIZE',10000);
            // DB::table(ucfirst($tabla))->truncate();
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

                    $SQLTablas[$tabla] = DB::connection('sqlsrv')->select('SELECT * FROM PoaCanes.dbo.'.$tabla.' ORDER BY (SELECT NULL AS NOORDER) OFFSET '. $start .' ROWS FETCH NEXT '. $max .' ROWS ONLY;');
                    
                    $renglon = "Exportando registros desde: ".$tabla. "\n";
                    foreach ( $SQLTablas[$tabla] as $row)
                    {                   
                        
                        $renglon .= $i.'|';
                        foreach ($row as $key=>$valor)
                        {
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
        Log::channel('sync')->info('Se creo archivo de exportación  '.$file_name);
        Log::channel('stderr')->info('Se creo archivo de exportación  '.$file_name);
        Storage::disk('import')->append($file_name, $row);
    }

    public function insert($vuelta, $tabla) //can_dueños
    {
        // $file_salida = Storage::disk('import')->get($tabla.$vuelta.'.sql');
        // dd(storage_path());
        switch($tabla)
        {
            case 'Can_Dueños':
                $tabla2 = 'canduenios'; 
                break;
            case 'Señas':
                $tabla2 = 'senias';
                break;
            case 'tipoExamen':
                $tabla2 = 'tipo_examen';
                break;
            default:
                $tabla2 = $tabla;
                break;
        }
            // dd($tabla);
        try {

            $file_salida = realpath('./'). env('STORE_IMPORT_SQL_FILES').$tabla.$vuelta.'.sql'; //<- acá está el error $tabla != can_dueños.sql
            // dd($file_salida);
            $query_export = "LOAD DATA LOCAL INFILE '" . addslashes($file_salida) . "' REPLACE INTO TABLE " .strtolower($tabla2). "
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
        $files_to_zip = glob(realpath('./').env('STORE_IMPORT_SQL_FILES').'*.sql');
        $totalQty = 0;
        $folder = realpath('./').env('STORE_IMPORT_SQL_FILES');

        //zipeamos archivos de importacion
        $zip = new \ZipArchive();
        $zip_file_name = 'importacion_'.$nombre.$date.'.zip';
        // dd($folder.$zip_file_name);
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
// SELECT CVCL_DIVISION_CVCL,
//  CVCL_SUCURSAL_IMP,
//  CTEC_CLIENTE_VENTA, 
//  CVCL_TIPO_VAR,
//   CVCL_NUMERO_CVCL,
// VCTC_FECHA_VTO_FIN ,
//  CVCL_REFERENCIA_1,
//   VCTC_SAL_ORI 
//  From 
//   dbPOA.dbo.CCOB_CVCL , dbPOA.dbo.CCOB_CVCC, dbPOA.dbo.CCOB_CTEC, dbPOA.dbo.CCOB_VCTC
//  Where
//  CVCL_DIVISION_CVCL = CVCC_DIVISION_CVCL and 
//  CVCL_SUCURSAL_IMP = CVCC_DIVISION_CVCL and 
//  CVCL_TIPO_VAR = CVCC_TIPO_CVCL and 
//  CVCL_NUMERO_CVCL = CVCC_NUMERO_CVCL and 
//  CVCC_CTACTE_CTEC = CTEC_CTACTE_CTEC and 
//  CTEC_CTACTE_CTEC = VCTC_CTACTE_CTEC and 
//  (NOT EXISTS (Select * from dbPOA.dbo.CCOB_SCOD 
//  where VCTC_CTACTE_CTEC = SCOD_CTACTE_VCTC and 
//  VCTC_RENGLON_VCTC = SCOD_RENGLON_VCTC))and 
//  CVCL_TIPO_VAR = 'CUO' and 
//  -- CTEC_CLIENTE_VENTA = 12548 and 
//  VCTC_SAL_ORI > 0
//  GROUP BY  CVCL_DIVISION_CVCL, CVCL_SUCURSAL_IMP, CTEC_CLIENTE_VENTA, CVCL_TIPO_VAR, 
//  CVCL_NUMERO_CVCL , VCTC_FECHA_VTO_FIN, CVCL_REFERENCIA_1, VCTC_SAL_ORI