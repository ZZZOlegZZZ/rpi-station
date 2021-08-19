<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class initrzd2021 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'initrzd2021 {--set_id=}';

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
          $this->info('Необходимо указать id станции php artisan initrzd --set_id=xxx');
        }
        $this->info('Инициализация станции для РЖД');
        $this->info('Id = '.$this->option('set_id'));

        \App\Configuration::setId($this->option('set_id'));

        \App\Configuration::setSettings([
          'ui'=>'rzd',
        ]);

        \App\ExpansionModule::create([
          "id" => 1,
          "alias" => 'mas',
          "is_optional" => 0,
        ]);

        \App\ExpansionModule::create([
          "id" => 2,
          "alias" => 'rm',
          "is_optional" => 1,
          "config" => (object)[
            "host"=>"192.168.1.1",
            "port"=>4002,
            "option"=>"True"
          ]
        ]);

        \App\ExpansionModule::create([
          "id" => 3,
          "alias" => 'do-02',
          "is_optional" => 1,
          "config" => (object)[
            "host"=>"192.168.1.1",
            "port"=>4002,
            "option"=>41
          ]
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
          "expansion_module_id" => 3,
          "alias" => "precipitation",
        ]);

        \App\Device::create([
          "expansion_module_id" => 1,
          "alias" => "pressure",
        ]);

        \App\Device::create([
          "expansion_module_id" => 2,
          "alias" => "rail_prism_temperature",
        ]);

        \App\ftpClient::create([
          "host" => 'pkcup.ru',
          "port" => 21,
          "login" => "mm94",
          "password" => "HNvfXb63",
          "station_id" => $this->option('set_id')
        ]);
    }
}
