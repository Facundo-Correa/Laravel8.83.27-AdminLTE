<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\models\Zonas;
use App\models\SantiZona;

class ExportZona extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:zona';

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
        $z = Zonas::all();
        
        $zo = json_decode($z);

        foreach ( $zo as $zone){

            $variable = SantiZona::create([
                'id'=>$zone->id,
                'nombre'=>$zone->zonas_desc
            ]);

            $variable->save();
        }
    }
}
