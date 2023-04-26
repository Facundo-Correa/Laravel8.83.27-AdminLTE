<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\models\SantiGeolocalizacion;
use App\models\Geolocalizacion;

class ExportGeolocalizacion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:geo';

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
        $imp = Geolocalizacion::all();
        $import = json_decode($imp);
        // dd($import);
        foreach ($import as $geo)
        {
            $var = SantiGeolocalizacion::create([
                'id_padre'=>$geo->parent_id,
                'nombre'=>$geo->nombre,
                'abreviatura'=>$geo->abreviatura,
                'codigo_lugar'=>$geo->codigo_lugar,
                'codigo_zona'=>$geo->codigo_zona,
                'latitud'=>$geo->latitud,
                'longitud'=>$geo->longitud,
            ]);
        }
    }
}
