<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\ToolsHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class Exportacion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sql:export';

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

        $this->export();
    }

    private function export()
    {
        //En $tablas_to_export agregar el nombre de las tablas tal cual estan en backendpoa
        
        //En el switch, en $where agregar el nombre de a donde se van a insertar los datos. 'examen_resultado_selecciones_can',

        $tablas_to_export = [
            'canduenios','canes',
            'apto_cria_apto','calendario', 'examen_resultado_selecciones_can',
            'catalogo_can', 'clasificacion_adiestramiento','clientes',
            'codigo_examen_extranjeros','colores','criaderos','cuotasimpagas',
            'denuncia_nacimiento','denuncia_servicio','estructura_categoria',
            'examenes','examenes_codigos','examen_categorias','examen_extranjeros',
            'examen_resultado_aptocria_can','examen_resultado_cab2_can',
            'examen_resultado_superior_can','examen_resul_dcf','examen_resul_dcfcodo',
            'figurantes','habilitantes','inscripcion_torneos','jueces','jueces_tipo_categoria',
            'juez_torneo','lugares','parametros_nros_del_sistema','pruebas_de_adiestramiento','radiologo',
            'reporte_tramites','resultados_adiestramiento','resultados_estructura','resultado_seleccion',
            'r_poa_pla', 'senias', 'sist_pcia', 'sist_pais', 'tatuador','tdbusuarios', 'ccob_tcli',
            'torneos','torneos_can','torneos_prueba','zonas', 'juez_categoria', 'tipo_examen',
            'ccob_clc1', 'ccob_clc2', 'ccob_clc3', 'ccob_clc4', 'ccob_acli', 
            'ccob_dcli'
        ];

        foreach($tablas_to_export as $tabla)
        {
            ToolsHelper::logheader("Exportarcion de tabla: ".$tabla);
    
            $max = (int)env('CHUNK_SIZE',10000); //indico el tamaño de cada grupo de registros a procesar
            $pdo = DB::connection()->getPdo();
            $rs = $pdo->query("SELECT COUNT(*) FROM $tabla");
            $total = $rs->fetchColumn();
            $pages = ceil($total / $max);
            try{
                
                for ($y = 1; $y < $pages +1 ; $y++) {
                    $offset = (($y - 1) * $max);
                    $start = ($offset == 0 ? 0 : ($offset + 1));
        
                    $this->sql_file = "Exportando registros desde\n";
        
                    $rs = $pdo->query('SELECT * from '.$tabla.' order by id ASC LIMIT ' . $max . ' OFFSET ' . $start . ' ;');
        
                    $i = 1;
                    $renglon = "Exportando registros \n";
                    foreach ($rs->fetchAll(\PDO::FETCH_OBJ) as $row) {
        
                     //ToolsHelper::log("proceso renglon: {$i}");
        
                        foreach ($row as $key => $valor) {
                            $renglon .= ToolsHelper::sanitize($valor, $key) . '|';
                        }
                        $renglon .= "\n";
                        $i++;
                    }

                    switch($tabla)
                    {
                        case 'ccob_clc1':
                            $where = 'delegacion';
                            break;
                            
                        case 'ccob_clc2':
                            $where = 'agrupacion';
                            break;

                        case 'ccob_clc3':
                            $where = 'distrito';
                            break;

                        case 'ccob_clc4':
                            $where = 'cliente_estado';
                            break;

                        case 'ccob_acli':
                            $where = 'cliente_actividad';
                            break;

                        case 'ccob_dcli':
                            $where = 'cliente_domicilio';
                            break;
                            
                        case 'ccob_tcli':
                            $where = 'tipo_cliente';
                            break;
                            
                        default:
                        $where = $tabla;
                        break;
                    }

                    //grabo archivo
                    ToolsHelper::saveFile($renglon, $y, $where);
                        
                    //Inserto registros en base de datos nueva
                    ToolsHelper::insert($y, env('STORE_SQL_FILES'), $where, $where);
                    
                    ToolsHelper::zipSql(env('STORE_SQL_FILES'), env('STORE_SQL_FILES'), $where);
                }
            }catch(Exception $e){
                    
                ToolsHelper::log($e,'stderr','error');
                                                        
            }
            ToolsHelper::logfooter($total, $where,'stderr','info');
            $i++;
        }
    }
}
