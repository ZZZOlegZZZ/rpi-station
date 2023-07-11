<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InitMrdDbl extends Command
{
    protected $signature = 'initMrdDbl';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('Инициализация станции МРД с двойными датчиками');

        \App\Configuration::setId(0);

        \App\Configuration::setSettings([
            'ui' => 'mrd-dbl',
        ]);

        \App\ExpansionModule::create([
            "id" => 1,
            "alias" => 'mrd-double',
            "is_optional" => 0,
        ]);

        \App\Device::create([
            "expansion_module_id" => 1,
            "alias" => "dtv_h",
        ]);

        \App\Device::create([
            "expansion_module_id" => 1,
            "alias" => "dtv_l",
        ]);

        \App\Device::create([
            "expansion_module_id" => 1,
            "alias" => "wind_speed_h",
        ]);

        \App\Device::create([
            "expansion_module_id" => 1,
            "alias" => "wind_speed_l",
        ]);

        \App\Device::create([
            "expansion_module_id" => 1,
            "alias" => "wind_dir_h",
        ]);

        \App\Device::create([
            "expansion_module_id" => 1,
            "alias" => "wind_dir_l",
        ]);

        \App\Device::create([
            "expansion_module_id" => 1,
            "alias" => "precipitation",
        ]);

        \App\Device::create([
            "expansion_module_id" => 1,
            "alias" => "pressure",
        ]);
    }
}
