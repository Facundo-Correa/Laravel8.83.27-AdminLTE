<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\models\Lugares;
use App\models\SantiPais;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ExportPais extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:pais';

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
        Log::channel('sync')->info("----------------------------------------------------");
        Log::channel('sync')->info("Exportarcion de tabla: Pais");

        $paises = DB::connection('sqlsrv1')->select('SELECT * FROM dbPOA.dbo.SIST_PAIS');
        
        Log::channel('sync')->info(" - Llenado de tabla temporal: Pais");

        foreach ($paises as $pais)
        {
            $var = SantiPais::create([
                'nombre'=>$pais->PAIS_NOMBRE
            ]);

            $var->save();
        }

        $cantidad = count($paises);
        Log::channel('sync')->info(" - Se importaron ".$cantidad." de rows");
        Log::channel('sync')->info(" - Fin de llenado de tabla: Pais");
        Log::channel('sync')->info("Fin de importarcion de la tabla");
        Log::channel('sync')->info("----------------------------------------------------");
    }
}
