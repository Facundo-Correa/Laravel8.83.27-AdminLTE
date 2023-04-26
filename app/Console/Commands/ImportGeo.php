<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\models\SISTPAIS;
use App\models\SISTPCIA;
use App\models\Lugares;
use App\models\Zonas;
use App\models\Calendario;
use App\models\Geolocalizacion;

class ImportGeo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:geo';

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
        $p = SISTPAIS::all();
        $paises = json_decode($p);
        
        foreach ($paises as $pais)
        {
            if(!is_numeric($pais->PAIS_PAIS))
            {
                $var = Geolocalizacion::create([
                    'parent_id'=>0,
                    'nombre'=>$pais->PAIS_NOMBRE,
                    'abreviatura'=>$pais->PAIS_PAIS,
                    'codigo_lugar'=>null,
                    'codigo_zona'=>null,
                    'latitud'=>null,
                    'longitud'=>null,
                ]);
    
                $var->save();
            }
        }

        $pr = SISTPCIA::all();
        $pro = json_decode($pr);

        foreach ($pro as $prov)
        {
            if(!is_numeric($prov->PCIA_PROVINCIA))
            {
                $var = Geolocalizacion::create([
                    'parent_id'=>1,
                    'nombre'=>$prov->PCIA_NOMBRE,
                    'abreviatura'=>$prov->PCIA_PROVINCIA,
                    'codigo_lugar'=>null,
                    'codigo_zona'=>null,
                    'latitud'=>null,
                    'longitud'=>null,
                ]);
    
                $var->save();
            }
        }
        
        $a = DB::connection('mysql')->select('SELECT DISTINCTROW(lugar_codigo), L.lugar_desc, `provincia_codigo` 
        FROM `calendario` C INNER JOIN Lugares AS L ON(c.lugar_codigo = L.lugar_cod) WHERE `lugar_codigo` != 999 ORDER BY `lugar_codigo`;');

        foreach ($a as $lugar)
        {
            $exist = Geolocalizacion::where('nombre', $lugar->lugar_desc)->first();
            $e = json_decode($exist);            
            
            if($e != null)
            {   
                $r = Geolocalizacion::where('id', $e->id)->update(['codigo_lugar'=>$lugar->lugar_codigo]);
            }
            else{
                if(!is_numeric($lugar->provincia_codigo))
                {
                    $var = Geolocalizacion::create([
                        'parent_id'=>Geolocalizacion::where('abreviatura', $lugar->provincia_codigo)->where('parent_id','!=', 0)->first()->id,
                        'nombre'=>$lugar->lugar_desc,
                        'abreviatura'=>null,
                        'codigo_lugar'=>$lugar->lugar_codigo,
                        'codigo_zona'=>null,
                        'latitud'=>null,
                        'longitud'=>null,
                    ]);
        
                    $var->save();
                }
            }
        }

        $c = DB::connection('mysql')->select('SELECT DISTINCTROW(criadero_zona), L.zonas_desc, `criadero_codigoprov` 
        FROM `criaderos` C INNER JOIN Zonas AS L ON(c.criadero_zona = L.zonas_cod) WHERE `criadero_zona` != 99 
        AND `criadero_zona` != "null" ORDER BY `criadero_zona`;');

        foreach ($c as $zona)
        {
            $exist = Geolocalizacion::where('nombre', $zona->zonas_desc)->first();
            $e = json_decode($exist);            
            
            if($e != null)
            {   
                $r = Geolocalizacion::where('id', $e->id)->update(['codigo_zona'=>$zona->criadero_zona]);
            }
            else{

                if(!is_numeric($zona->criadero_codigoprov))
                {
                    $var = Geolocalizacion::create([
                        'parent_id'=>Geolocalizacion::where('abreviatura', $zona->criadero_codigoprov)->where('parent_id','!=', 0)->first()->id,
                        'nombre'=>$zona->zonas_desc,
                        'abreviatura'=>null,
                        'codigo_lugar'=>null,
                        'codigo_zona'=>$zona->criadero_zona,
                        'latitud'=>null,
                        'longitud'=>null,
                    ]);
        
                    $var->save();
                }
            }
        }

        $d = DB::connection('mysql')->select('SELECT DISTINCTROW(tatuador_zona), L.zonas_desc FROM `tatuador` C 
        INNER JOIN Zonas AS L ON(c.tatuador_zona = L.zonas_cod) WHERE `tatuador_zona` != "null" AND `tatuador_zona` != 99 
        ORDER BY `tatuador_zona`;');

        foreach ($d as $zona)
        {
            $exist = Geolocalizacion::where('nombre', $zona->zonas_desc)->first();
            $e = json_decode($exist);            
            
            if($e != null)
            {   
                $r = Geolocalizacion::where('id', $e->id)->update(['codigo_zona'=>$zona->tatuador_zona]);
            }
            else{
                $var = Geolocalizacion::create([
                    'parent_id'=>1,
                    'nombre'=>$zona->zonas_desc,
                    'abreviatura'=>null,
                    'codigo_lugar'=>null,
                    'codigo_zona'=>$zona->tatuador_zona,
                    'latitud'=>null,
                    'longitud'=>null,
                ]);
    
                $var->save();
            }
        }

        $z = Geolocalizacion::create([
            'parent_id'=>null,
            'nombre'=>'NO PRESENTA/NO CORRESPONDE',
            'abreviatura'=>99,
            'codigo_lugar'=>999,
            'codigo_zona'=>99,
            'latitud'=>null,
            'longitud'=>null,
        ]);
    }
}
