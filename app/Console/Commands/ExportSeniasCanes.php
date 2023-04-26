<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\models\Senias;
use App\models\SantiSeniasCanes;

class ExportSeniasCanes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:senias';

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
        Log::channel('sync')->info("Exportarcion de tabla: Senias_Canes");
        $sen = Senias::all();
        $senias = json_decode($sen);
        Log::channel('sync')->info(" - Llenado de tabla temporal: Senias_Canes");

        foreach ($senias as $señas)
        {
            $var = SantiSeniasCanes::create([
                'id'=>$señas->id,
                'descripcion'=>$señas->senia_descripcion
            ]);

            $var->save();
        }
        Log::channel('sync')->info("Fin exportarcion de tabla: Senias_Canes");
        Log::channel('sync')->info("----------------------------------------------------");
    }
}
