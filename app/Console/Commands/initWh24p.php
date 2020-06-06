<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class initWh24p extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'initWh24p {--id=} {--power=0} {--poll_intv=15}';

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
      if (!$this->option('id')){
        $this->info('Необходимо указать id станции php artisan initWh24p --id=xxx');
      }

      $this->info('id='.$this->option('id').'; power='.$this->option('power'));
      \App\Configuration::setId($this->option('id'));

      \App\Configuration::setSettings([
        'power'=>$this->option('power'),
        'poll_intv'=>$this->option('poll_intv'),

      ]);

      \App\PushClient::create([
        "host" => 'agro.mm94.ru',
        "port" => 443,
        "station_id" => $this->option('id')
      ]);

      \App\ExpansionModule::create([
        "id" => 1,
        "alias" => 'wh24p',
        "is_optional" => 0,
      ]);

      \App\ExpansionModule::create([
        "id" => 2,
        "alias" => 'dpg-rpi',
        "is_optional" => 1,
      ]);

      \App\ExpansionModule::create([
        "id" => 3,
        "alias" => 'ws-adda-board',
        "is_optional" => 1,
      ]);

      \App\Device::create([
        "expansion_module_id" => 1,
        "alias" => "complex",
      ]);

      \App\Device::create([
        "expansion_module_id" => 2,
        "alias" => "soil_temperature",
      ]);

      \App\Device::create([
        "expansion_module_id" => 3,
        "alias" => "pr_2_6",
        "config" => (object)[
          "mask"=>(object)[
            "soil_moisture_1" => "ad0",
            "soil_moisture_2" => "ad1",
            "soil_moisture_3" => "ad2",
            "soil_moisture_4" => "ad3",
          ]
        ]
      ]);
    }
}
