<?php


namespace App\Helpers;


use App\Mail\ExportNotification;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ToolsHelper
{
    private static $start_time;
    private static $finished_time;


    /***
     * Registra un mensaje en algun canal de salida
     * @param $message
     * @param string $channel
     * @param string $type
     */
    public static function log ( $message, $channel='stderr', $type='info')
    {
        Log::channel($channel)->{$type}($message);
    }

    /***
     * Stea el Header de los mensajes
     * @param $message
     * @param string $channel
     * @param string $type
     */
    public static function logheader($message,$channel='stderr',$type='info'){
        static::$start_time = Carbon::parse(NOW());

        self::log("----------------------------------------------------",$channel,$type);
        self::log($message,$channel,$type);


    }

    /***
     * Setea el footer de los mensajes de un script y calcula tiempo de ejecución
     * @param $total
     * @param $tabla
     * @param string $channel
     * @param string $type
     */
    public static function logfooter($total, $tabla,$channel='stderr',$type='info'){
        static::$finished_time = Carbon::parse(NOW());
        $totalDuration = static::$finished_time->locale('es')->diffForHumans(static::$start_time,CarbonInterface::DIFF_ABSOLUTE);


        self::log(" - Se importaron $total de rows", $channel,$type);
        self::log(" - Fin de llenado de tabla: $tabla",$channel,$type);
        self::log("Fin de importacion de las tablas",$channel,$type);
        self::log("duracion del script {$totalDuration}",$channel,$type);
        self::log("----------------------------------------------------",$channel,$type);
    }

    /***
     * Limpia un string para poder ser utilizado en el load data
     * @param $string
     * @return string
     */
    public static function sanitize($valor,$key){
        if ($valor > 0) {
            $val = (int)$valor;
        }

        $val = preg_replace('/^$/', '\N', $valor);
        $val = str_replace('\r', '\t', $val);
        $val = str_replace('\|', '\s', $val);
        $val = str_replace('\n', '\t', $val);

        if (preg_match('/fecha/', $key) && preg_match('/^$/', $valor)) {
            $val = '0000-00-00 00:00:00';
        }

        return $val;
    }

    /***
     * Genera un archivo con un string generalmente un set de registros
     * @param $row
     * @param $vuelta
     * @param $sql_file_name
     */
    public static  function saveFile($row, $vuelta, $sql_file_name){
        $file_name = $sql_file_name.'_'.$vuelta.'.sql';
        self::log('Se cre archivo de exportación  '.$file_name);
        self::log('Se cre archivo de exportación  '.$file_name,'sync');
        Storage::disk('export')->append($file_name, $row);
    }

    /***
     * Inserta un archivo sql en la base de datos
     * @param $vuelta
     * @param $sql_dir_fiels
     * @param $sql_file_name
     */
    public  static function insert($vuelta, $sql_dir_fiels, $sql_file_name, $tabla)
    {
        $file_salida = realpath('./'). $sql_dir_fiels.$sql_file_name.'_'.$vuelta.'.sql';
        
        if(PHP_OS == 'WINNT' || PHP_OS == 'WIN32' || PHP_OS == 'Windows' || PHP_OS == 'Windows XP 64-bit')
        {
            $file_salida = addslashes($file_salida);
        }

        try {

            $query_export = "LOAD DATA LOCAL INFILE '" . $file_salida . "' REPLACE INTO TABLE can_{$tabla}
                          CHARACTER SET UTF8
                          FIELDS TERMINATED BY '|'
                          LINES TERMINATED BY '\n'  IGNORE 1 LINES";

            self::log('Ejecutando sentencia de inserción den dbOnline '.$query_export);
            self::log('Ejecutando sentencia de inserción den dbOnline '.$query_export,'sync');

            $result = DB::connection('dbOnline')->getpdo()->exec($query_export);

            self::log('Se insertaron '.$result,'sync');
            self::log('Se insertaron '.$result);



        } catch(\Exception $e){
            echo $query_export;
            Log::channel('stderr')->error($e->getMessage());
            Log::channel('sync')->error($e->getMessage());
        }
    }

    /***
     * Crea un archivo .zip con los archivos .sql de  un directorio definido.
     * @param $sql_files
     * @param $sql_dir_files
     * @param $zip_name
     */
    public static function zipSql($sql_files,$sql_dir_files,$zip_name)
    {
        
        self::log(' - Comprimiendo archivos creados en la exportacion ','sync');
        self::log(' - Comprimiendo archivos creados en la exportacion ');
        $date = Carbon::now()->format('Y-m-d_h-i');
        $files_to_zip = glob(realpath('./').$sql_files. '*.sql');

        if(PHP_OS == 'WINNT' || PHP_OS == 'WIN32' || PHP_OS == 'Windows' || PHP_OS == 'Windows XP 64-bit')
        {
            $files_to_zip = glob(addslashes(realpath('./').$sql_files. '*.sql'));
        }
        
        $totalQty = count($files_to_zip);
        $folder = realpath('./').$sql_dir_files;

        if(PHP_OS == 'WINNT' || PHP_OS == 'WIN32' || PHP_OS == 'Windows' || PHP_OS == 'Windows XP 64-bit')
        {
            $folder = addslashes(realpath('./').$sql_dir_files);
        }
        
        $filesToDelete = [];

        //zipeamos archivos de exportacion y lo guardamos en exportados
        // Initializing ZIP FILE
        $zip = new \ZipArchive();
        $zip_file_name = $zip_name.'_'.$date.'.zip';
        $zip->open($folder.$zip_file_name, \ZipArchive::CREATE);

        foreach($files_to_zip as $file)
        {
            // Add files from root directory to ZIP
            if (file_exists($file) && is_file($file))
            {
                $filename = substr($file, strlen($folder)-1);
                self::log("agregando {$filename} al archivo {$zip_file_name} ZIP");
                $zip->addFile($file,$filename);
                $filesToDelete[] = $file;
            }
        }

        $zip->close();

        self::log(' - Borrando archivos creados en la exportacion ','sync');
        self::log(' - Borrando archivos creados en la exportacion ');
        foreach ($filesToDelete as $file) {
            unlink($file);
        }
        self::log(" - Se borraron {$totalQty}  de archivos creados en la exportacion ");
    }

    /***
     * informa via mail del procesamiento de una o varias tablas.
     * @param $tabla
     */
    private static function notificar($tabla)
    {

        //enviamos mail de notificacion de exportación
        if (env('MAIL_USERNAME')){
            Mail::to(env('EMAIL_ADMIN'))
                ->bcc(env('EMAIL_TMT'))
                ->send(new ExportNotification($tabla));
        }
    }

    /***
     * Redefino configuraciones de php
     */
    public static function changeIniSet(){
        ini_set('max_execution_time', 600);
        ini_set('max_allowed_packet',500);
        ini_set('mysql.connect_timeout', 300);
        ini_set('default_socket_timeout', 300);
        ini_set('mysqli.reconnect',true);
        ini_set('wait_timeout',36000);
    }
}
