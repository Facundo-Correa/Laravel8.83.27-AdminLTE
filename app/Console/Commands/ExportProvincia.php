<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\models\SantiProvincia;
use App\models\SantiPais;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ExportProvincia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:provincia';

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
        Log::channel('sync')->info("Exportarcion de tabla: Provincia");

        $provincias = DB::connection('sqlsrv1')->select('SELECT * FROM dbPOA.dbo.SIST_PCIA');
        
        Log::channel('sync')->info(" - Llenado de tabla temporal: Provincia");

        foreach ($provincias as $provincia)
        {
            $var = SantiProvincia::create([
                'nombre'=>$provincia->PCIA_NOMBRE,
                'id_pais'=>SantiPais::where('nombre','=', 'ARGENTINA')->first()->id,
            ]);

            $var->save();
        }
    }
}
