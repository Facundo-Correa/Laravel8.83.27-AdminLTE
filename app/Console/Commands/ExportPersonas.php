<?php

namespace App\Console\Commands;

use App\Helpers\ToolsHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;
use App\Models\OnlinePersonas;
use App\Models\Clientes;
use App\Models\CCOBCLC1;// clc1 delegacion
use App\Models\CCOBCLC2;// clc2 agrupacion
use App\Models\CCOBCLC3;// clc3 distrito
use App\Models\CCOBCLC4;
use Illuminate\Support\Facades\Schema;

// clc4 estado socio

class ExportPersonas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:personas';

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

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        //Cambio variables de entorno
        ToolsHelper::changeIniSet();

        //deshabilito las relaciones de mysql
        Schema::disableForeignKeyConstraints();

        //Obtengo vista de clientes con sus relaciones armadas y los datos que voy a necesitar en personas
        $this->exportPersonas();

        //exporto comentarios y observaciones de clientes
        $this->exportObservaciones();



    }

    private function exportPersonas(){
        try{


            ToolsHelper::logheader("Exportarcion de tabla: Personas");
            /**
             * Conecto a la db, obtengo total de personas y preparo paginado
             */
            $max = (int)env('CHUNK_SIZE',10000); //indico el tamaño de cada grupo de registros a procesar
            $pdo = DB::connection()->getPdo();
            $rs = $pdo->query("SELECT COUNT(*) FROM xVw_personas");
            $total = $rs->fetchColumn();
            $pages = ceil($total / $max);

            //Recorro registros del paginado
            for ($y = 1; $y < $pages +1 ; $y++) {
                $offset = (($y - 1) * $max);
                $start = ($offset == 0 ? 0 : ($offset + 1));

                $this->sql_file = "Exportando registros desde\n";

                $rs = $pdo->query('SELECT * from xVw_personas order by id ASC LIMIT ' . $max . ' OFFSET ' . $start . ' ;');

                $i = 1;
                $renglon = '';
                foreach ($rs->fetchAll(\PDO::FETCH_OBJ) as $persona) {

                 //ToolsHelper::log("proceso renglon: {$i}");

                    foreach ($persona as $key => $valor) {
                        $renglon .= ToolsHelper::sanitize($valor, $key) . '|';
                    }
                    $renglon .= now().'|'.now().'|\N|'."\n";
                    $i++;
                }


                //grabo archivo
                ToolsHelper::saveFile($renglon, $y, 'personas');

                //Inserto registros en base de datos nueva
                ToolsHelper::insert($y, env('STORE_SQL_FILES'), 'personas', 'personas');
                /***
                 * campo que sobra solo tiene un 1 y un registro con 90 pregutnar a eugenia
                 *
                 *  cl.`CLIE_COND_PAGO`,
                 *  cl.`CLIE_INF_TABASTO` AS inf_tabasto,
                 *  cl.`CLIE_COBRO_CORREL` AS cobro_correl,
                 *  cl.`CLIE_VEHICULO` AS vehiculo,
                 *  cl.`CLIE_DISTRIBUIDOR` AS distribuidor
                 *  cl.`CLIE_ZONA_DISTRIB` AS zona_distrib
                 *
                 */

                /***
                 * Campos para direccion y marcar como predeterminada, averiguar donde
                 * estan los otros domicilios
                 *
                 * cl.`CLIE_DOMICILIO`,
                 * cl.`CLIE_LOCALIDAD`,
                 * cl.`CLIE_COD_POSTAL`,
                 * cl.`CLIE_PROVINCIA`,
                 * cl.`CLIE_PAIS`,
                 * cl.`CLIE_HORA_ATENCION` as
                 * cl.`CLIE_HORA_ENTREGA` as
                 * cl.`CLIE_CONTAC_VENTA` ,
                 * cl.`CLIE_CONTAC_COBRO`,
                 */

                /**
                 * Campos para exportar a observaciones, por cada campo una entrada
                 *     cl.`CLIE_OBSERVACION` as observacion,
                 *   CLIE_PROVEEDOR
                 *   cl.`CLIE_REFERENCIA` as referencia,
                 */


            }

            ToolsHelper::zipSql(env('STORE_SQL_FILES'), env('STORE_SQL_ZIP_FILES'), 'export_personas');


        }catch(Exception $e){

            ToolsHelper::log($e,'stderr','error');

        }

        ToolsHelper::logfooter($total,'Personas','stderr','info');

    }

    private function exportObservaciones(){
        try{

            ToolsHelper::logheader("Exportarcion de tabla: PersonasObservaciones");
            /**
             * Conecto a la db, obtengo total de personas y preparo paginado
             */
            $max = (int)env('CHUNK_SIZE',10000); //indico el tamaño de cada grupo de registros a procesar
            $pdo = DB::connection()->getPdo();
            $rs = $pdo->query('SELECT COUNT(*) FROM clientes where CLIE_OBSERVACION != "" or CLIE_COD_PROVEEDOR != ""
                                     OR CLIE_REFERENCIA != ""');
            $total = $rs->fetchColumn();
            $pages = ceil($total / $max);

            //Recorro registros del paginado
            for ($y = 1; $y < $pages +1 ; $y++) {
                $offset = (($y - 1) * $max);
                $start = ($offset == 0 ? 0 : ($offset + 1));


                $rs = $pdo->query('SELECT ID, CLIE_CLIENTE, CLIE_OBSERVACION, CLIE_COD_PROVEEDOR, CLIE_REFERENCIA FROM
                                    `clientes` where CLIE_OBSERVACION != "" or CLIE_COD_PROVEEDOR != ""
                                     OR CLIE_REFERENCIA != "" order by ID ASC LIMIT ' . $max . ' OFFSET ' . $start . ' ;');

                $i = 1;
                $renglon = "Escribiendo archivo de inserción en DBOnline\n";
                foreach ($rs->fetchAll(\PDO::FETCH_OBJ) as $key=>$row) {

                    if($row->CLIE_OBSERVACION)
                        $renglon .=$i++.'|'.$row->ID.'|'.$row->CLIE_CLIENTE.'|\N|'. ToolsHelper::sanitize($row->CLIE_OBSERVACION, $key) . '|'.now().'|'.now().'|\N'."\n";
                    if($row->CLIE_COD_PROVEEDOR)
                        $renglon .=$i++.'|'.$row->ID.'|'.$row->CLIE_CLIENTE.'|\N|'. ToolsHelper::sanitize($row->CLIE_COD_PROVEEDOR, $key) . '|'.now().'|'.now().'|\N'."\n";
                    if($row->CLIE_REFERENCIA)
                        $renglon .=$i++.'|'.$row->ID.'|'.$row->CLIE_CLIENTE.'|\N|'. ToolsHelper::sanitize($row->CLIE_REFERENCIA, $key) . '|'.now().'|'.now().'|\N'."\n";


                }

                //grabo archivo
                ToolsHelper::saveFile($renglon, $y, 'personas_observaciones');

                //Inserto registros en base de datos nueva
                ToolsHelper::insert($y, env('STORE_SQL_FILES'), 'personas_observaciones', 'personas_observaciones');


            }

            ToolsHelper::zipSql( env('STORE_SQL_FILES'), env('STORE_SQL_ZIP_FILES'), 'export_personas_observaciones');


        }catch(Exception $e){

            ToolsHelper::log($e,'stderr','error');

        }

        ToolsHelper::logfooter($i,'PersonasObservaciones','stderr','info');

    }
}
