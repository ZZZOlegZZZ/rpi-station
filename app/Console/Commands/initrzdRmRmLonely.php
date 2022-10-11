<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class initrzdRmRmLonely extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'initrzdRmRmLonely {--set_id=}';

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
          "alias" => 'rm-rm',
          "is_optional" => 1,
          "config" => (object)[
            "host"=>"192.168.1.1",
            "port"=>4002,
            "option"=>"True"
          ]
        ]);

        \App\Device::create([
          "expansion_module_id" => 1,
          "alias" => "rail_prism_temperature",
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