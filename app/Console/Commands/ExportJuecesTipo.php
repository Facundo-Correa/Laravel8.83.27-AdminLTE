<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\models\JuecesTipoCategoria;
use App\models\SantiJuecesTipo;
use App\models\Jueces;

class ExportJuecesTipo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:juecestipo';

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
        $juez = JuecesTipoCategoria::all();
        $jueces = json_decode($juez);

        foreach ($jueces as $j)
        {
            $var = SantiJuecesTipo::create([
                'id'
            ]);
        }
    }
}
