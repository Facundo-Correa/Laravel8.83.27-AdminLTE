<?php

namespace App\Console\Commands;

use App\models\Colores;
use App\models\SantiColoresCanes;
use Illuminate\Console\Command;

class ExportColoresCanes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:colores';

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
        $colores = Colores::all();
        $colo = json_decode($colores);
        foreach ($colo as $color){
            $var = SantiColoresCanes::create([
                'id'=>$color->id,
                'descripcion'=>$color->color_desc
            ]);
        }
    }
}
