<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function pollDevice(ExpansionModule $module){
      $command = escapeshellcmd(
        'python3 resources/modules/'.
        $module->alias.
        '/driver.py'
      );
      $output = shell_exec($command);
      return $output;
    }

    public function setInvalid() {
      $this->update([
        'is_valid' => false
      ]);
    }

    public function setProcessed(){
      $this->update([
        'processed_at' => now()
      ]);
    }

    public function rawData(){
      return $this->hasMany(ModuleRawData::class);
    }

    public static function getUnprocessed(){
      return self::where('is_valid', 1)->whereNull('processed_at')->get();
    }
}
