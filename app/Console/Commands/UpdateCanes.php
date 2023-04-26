<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\models\CanesSanti;
use App\models\Canes;

class UpdateCanes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:canes';

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
        Log::channel('sync')->info("Exportando actualizacion de tabla: canes");

        $canes = Canes::all();
        $cane = json_decode($canes); 
        // dd($canes[0]);

        Log::channel('sync')->info(" - Llenado de tabla temporal: canes");

        foreach ($cane as $can)
        {
            $madre = Canes::where('can_codigo_letra', $can->can_madre_letra)->where('can_codigo_numero', $can->can_madre_numero)->first();
            $padre = Canes::where('can_codigo_letra', $can->can_padre_letra)->where('can_codigo_numero', $can->can_padre_numero)->first();
            
            if($madre != null){$idMadre = $madre->id;}else{$idMadre = $madre;}

            if($padre != null){$idPadre = $padre->id;}else{$idPadre = $padre;}

            try{
                $var = CanesSanti::where('id', $can->id)->update([
                    'id_madre'=>$idMadre,
                    'id_padre'=>$idPadre,
                    'codigo_letra'=>$can->can_codigo_letra,
                    'codigo_numero'=>$can->can_codigo_numero,
                ]);
            }
            catch(\Exception $e) {
                Log::channel('sync')->info($e);
                return $e->getMessage();
            }

            var_dump($can->id);
        }
        $cantidad = count($canes);
        Log::channel('sync')->info(" - Se actualizaron ".$cantidad." de rows");
        Log::channel('sync')->info(" - Fin de actualizacion de tabla: canes");
        Log::channel('sync')->info("Fin de actualizacion de las tablas");
        Log::channel('sync')->info("----------------------------------------------------");
    }
}
