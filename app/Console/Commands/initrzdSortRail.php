<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class initrzdSortRail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'initrzdSortRail {--set_id=}';

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
        if (!$this->option('set_id')){
          $this->info('Необходимо указать id станции php artisan initrzdSortRail --set_id=xxx');
        }
        $this->info('Инициализация станции для РЖД');
        $this->info('Id = '.$this->option('set_id'));

        \App\Configuration::setId($this->option('set_id'));

        \App\Configuration::setSettings([
          'ui'=>'rzd',
        ]);

        \App\ExpansionModule::create([
          "id" => 1,
          "alias" => 'ks-02sortRail',
          "is_optional" => 0,
        ]);

        \App\ExpansionModule::create([
          "id" => 2,
          "alias" => 'mercury-206',
          "is_optional" => 1,
        ]);

        \App\ExpansionModule::create([
          "id" => 3,
          "alias" => 'pow-mon',
          "is_optional" => 1,
        ]);

        \App\Device::create([
          "expansion_module_id" => 1,
          "alias" => "dtv",
        ]);

        \App\Device::create([
          "expansion_module_id" => 1,
          "alias" => "wind_speed",
        ]);

        \App\Device::create([
          "expansion_module_id" => 1,
          "alias" => "wind_dir",
        ]);

        \App\Device::create([
          "expansion_module_id" => 1,
          "alias" => "precipitation",
        ]);

        \App\Device::create([
          "expansion_module_id" => 1,
          "alias" => "pressure",
        ]);

        \App\Device::create([
          "expansion_module_id" => 1,
          "alias" => "rail_prism_temperature",
        ]);

        \App\Device::create([
          "expansion_module_id" => 1,
          "alias" => "power_monitor",
        ]);

        \App\Device::create([
          "expansion_module_id" => 2,
          "alias" => "counter",
        ]);

        \App\Device::create([
          "expansion_module_id" => 3,
          "alias" => "monitor",
        ]);

        \App\ftpClient::create([
          "host" => '217.175.154.119',
          "port" => 21,
          "login" => "userzd",
          "password" => "userzd",
          "station_id" => $this->option('set_id')
        ]);
    }
}