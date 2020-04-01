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

      \App\ftpClient::create([
        "host" => 'agro.mm94.ru',
        // "host" => "127.0.0.1",
        "port" => 21,
        "login" => "ftpms",
        "password" => "KleverStation24",
        "station_id" => $this->option('id')
      ]);
    }
}
