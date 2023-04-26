<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\ToolsHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class ExportAptoCria extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:aptocria';

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
        //En $tablas_to_export agregar el nombre de las tablas tal cual cuando no tienen relaciones.
        //Si tienen relaciones, agregar el nombre de la vista
        //En $where agregar el nombre de a donde se van a insertar los datos. En el switch

        $tablas_to_export = ['apto_cria_apto', 'geolocalizacion'];

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
        
        
                    //grabo archivo
                    ToolsHelper::saveFile($renglon, $y, $tabla);
        
                    switch($tabla)
                    {
                        case 'apto_cria_apto':
                            $where = 'apto_cria_canes';
                            break;
                        default:
                        $where = $tabla;
                        break;
                    }

                    //Inserto registros en base de datos nueva
                    ToolsHelper::insert($y, env('STORE_SQL_FILES'), $tabla, $where);
                   
                    ToolsHelper::zipSql(env('STORE_SQL_FILES'), env('STORE_SQL_FILES'), $tabla);
                }
            }catch(Exception $e){
    
                ToolsHelper::log($e,'stderr','error');
    
            }
            ToolsHelper::logfooter($total, $tabla,'stderr','info');
            $i++;
        }
    }
}
