<?php

namespace App\Console\Commands;
use App\Mail\CompactDiskMail;
use App\Mail\ExportNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;
use App\Models\CanesSanti;
use App\Models\Canes;
use App\Models\Colores;
use App\Models\Senias;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ExportCanes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:canes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /***
     * Almacenamos los registros
     *
     * @var string
     */
    protected $sql_file = '';

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


        Schema::disableForeignKeyConstraints();
        Log::channel('sync')->info("----------------------------------------------------");
        Log::channel('sync')->info("Exportarcion de tabla: canes");

        Log::channel('stderr')->info("----------------------------------------------------");
        Log::channel('stderr')->info("Exportarcion de tabla: canes");

        // Variables a utilizar
        Log::channel('sync')->info(" - preparando registros de salida: canes");
        Log::channel('stderr')->info(" - preparando registros de salida: canes");
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $max = (int)env('CHUNK_SIZE',10000);

        $pdo = DB::connection()->getPdo();

        $rs = $pdo->query("SELECT COUNT(*) FROM xVw_canes");
        $total = $rs->fetchColumn();

        $pages = ceil($total / $max);
        for ($i = 1; $i < ($pages + 1); $i++) {
            $startTime = Carbon::parse(NOW());

            $offset = (($i - 1)  * $max);
            $start = ($offset == 0 ? 0 : ($offset + 1));

            $this->sql_file = "Exportando registros desde\n";

            $rs =  $pdo->query('SELECT * from xVw_canes order by id ASC LIMIT '.$max.' OFFSET '.$start.' ;');


            foreach ($rs->fetchAll(\PDO::FETCH_OBJ) as $can) {

                $letra = $this->sanitize($can->can_codigo_letra);
                $codigo = $this->sanitize($can->can_codigo_numero);
                $nombre = $this->sanitize($can->can_nombre);
                $apellido = $this->sanitize($can->can_apellido);
                $nacimiento = $this->sanitize($can->can_fecha_nacimiento);
                if($nacimiento =='\N')
                {
                    $nacimiento = '0000-00-00 00:00:00';
                }

                $sexo = $this->sanitize($can->can_sexo);

                $peludo = $this->sanitize($can->can_peludo);
                if ($peludo == '\N' || $peludo == 'NO') {
                    $peludo = 0;
                } else {
                    $peludo = 1;
                }

                $fertil = $this->sanitize($can->can_servicios_fertiles);
                $infor = $this->sanitize($can->can_servicios_informados);
                $criasP = $this->sanitize($can->can_cantidad_crias_permitidas);
                $criasR = $this->sanitize($can->can_crias_registradas);
                $pedigree = $this->sanitize($can->can_emision_pedigree);
                //$trans = $this->sanitize($can->can_nro_transferencia);
                $dcfG = $this->sanitize($can->can_dcf_grado);
                $dcfCali = $this->sanitize($can->can_dcf_calificacion);
                $dcfCG = $this->sanitize($can->can_dcfcodo_grado);
                $dcfCC = $this->sanitize($can->can_dcfcodo_calificacion);
                $sClase = $this->sanitize($can->can_seleccion_clase);
                $sCantSer = $this->sanitize($can->can_seleccion_cantser);
                $sFvto = $this->sanitize($can->can_seleccion_fvto);
                $sValidez = $this->sanitize($can->can_seleccion_validez);
                $cab = $this->sanitize($can->can_cab2);
                $apto = $this->sanitize($can->can_apto);
                $eSuperior = $this->sanitize($can->can_examen_superior);
                $cResidencia = $this->sanitize($can->can_cambio_residencia);
                $fAlta = $this->sanitize($can->can_fecha_alta);
                $fDefuncion = $this->sanitize($can->can_fecha_defuncion);
                $embar = $this->sanitize($can->can_embargado);
                if($embar == 'NO'){
                    $embar = 0;
                } else{
                    $embar = 1;
                }

                $perdido = $this->sanitize($can->can_perdido);
                if($perdido == 'NO'){
                    $perdido = 0;
                } else{
                    $perdido = 1;
                }


                $obser = $this->sanitize($can->can_observaciones);
                $obser =  str_replace("\n", "\t" ,$obser);
                $aCompite = $this->sanitize($can->can_fecha_agrupacion_compite);
                $idpadre = $can->id_padre>0?$can->id_padre:1 ;
                $idmadre = $can->id_madre>0?$can->id_madre:1 ;
                $idcolor = $can->id_color>0?$can->id_color:99 ;
                $idsenia = $can->id_senia>0?$can->id_senia:99 ;

                $this->sql_file .=
                    $can->id . '|' .
                    $nombre . '|' .
                    $apellido . '|' .
                    $nacimiento . '|' .
                    $sexo . '|' .
                    $idcolor . '|' .
                    $idsenia . '|' .
                    $peludo . '|' .
                    $fertil . '|' .
                    $infor . '|' .
                    $criasP . '|' .
                    $criasR . '|' .
                    $pedigree . '|' .
                    $dcfG . '|' .
                    $dcfCali . '|' .
                    $dcfCG . '|' .
                    $dcfCC . '|' .
                    $sClase . '|' .
                    $sCantSer . '|' .
                    $sFvto . '|' .
                    $sValidez . '|' .
                    $cab . '|' .
                    $apto . '|' .
                    $eSuperior . '|' .
                    $cResidencia . '|' .
                    $fAlta . '|' .
                    $fDefuncion . '|' .
                    $embar . '|' .
                    $perdido . '|' .
                    $obser . '|' .
                    $aCompite . '|' .
                    NOW() . '|' .
                    NOW() . '|' .
                    '\N |' .
                    $idpadre. '|' .
                    $idmadre . '|' .
                    $letra . '|' .
                    $codigo ."\n" ;

                echo '.';

            }

            $this->saveFile($this->sql_file,$i);
            $finishTime = Carbon::parse(NOW());
            $totalDuration = $finishTime->diffForHumans($startTime);

            Log::channel('stderr')->info('Fin Vuelta '.$i .' de '.$pages );
            Log::channel('stderr')->info(' tiempo de vuelta '.$totalDuration);
            Log::channel('sync')->info('Fin Vuelta '.$i .' de '.$pages );

            //Inserto registros
            $this->insert($i);

        }

        //Zipeamos archivos creados
        $this->zipSql();

        //Notificamos por mail
        $this->notificar();

        Log::channel('sync')->info('Total de Registros afectados '.$total);
        Log::channel('stderr')->info('Total de Registros afectados '.$total);

        Log::channel('sync')->info('Fin de Exportacion Canes' );
        Log::channel('sync')->info('-------------------------------------------------------------');
        Log::channel('stderr')->info('Fin de Exportacion Canes' );
        Log::channel('stderr')->info('-------------------------------------------------------------');

        Schema::enableForeignKeyConstraints();

    }

    public function sanitize($string){
        $field = $string? trim(rtrim($string)) : '\N';

        return $field;
    }
    public function saveFile($row, $vuelta){
        $file_name = 'canes'.$vuelta.'.sql';
        Log::channel('sync')->info('Se cre archivo de exportación  '.$file_name);
        Log::channel('stderr')->info('Se cre archivo de exportación  '.$file_name);
        Storage::disk('export')->append($file_name, $row);
    }

    public function insert($vuelta)
    {
        try {

            $file_salida = realpath('./'). env('STORE_SQL_FILES').'canes'.$vuelta.'.sql';
            $query_export = "LOAD DATA LOCAL INFILE '" . $file_salida . "' REPLACE INTO TABLE canes
                          CHARACTER SET UTF8
                          FIELDS TERMINATED BY '|'
                          LINES TERMINATED BY '\n'  IGNORE 1 LINES";

            Log::channel('sync')->info('Ejecutando sentencia de inserción den dbOnline '.$query_export);
            Log::channel('stderr')->info('Ejecutando sentencia de inserción den dbOnline '.$query_export);

            $result = DB::connection('dbOnline')->getpdo()->exec($query_export);
            Log::channel('sync')->info('Se insertaron '.$result);
            Log::channel('stderr')->info('Se insertaron '.$result);



        } catch(\Exception $e){
            echo $query_export;
            Log::channel('stderr')->error($e->getMessage());
            Log::channel('sync')->error($e->getMessage());
        }
    }

    private function zipSql()
    {
        $date = Carbon::now()->format('Y-m-d_h-i');
        $files_to_zip = glob(realpath('./').env('STORE_SQL_FILES') . '*.sql');
        $totalQty = 0;
        $folder = realpath('./').env('STORE_SQL_ZIP_FILES');

        //zipeamos archivos de exoprtacion y lo guardamos en exportados
        // Initializing ZIP FILE
        $zip = new \ZipArchive();
        $zip_file_name = 'exportacion' .$date.'.zip';
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


    }

    private function notificar()
    {

        //enviamos mail de notificacion de exportación
        if (env('MAIL_USERNAME')){
            Mail::to(env('EMAIL_ADMIN'))
                ->bcc(env('EMAIL_TMT'))
                ->send(new ExportNotification('Canes'));
        }
    }
}
