<?php

namespace App;

use App\StationData;
use App\ExpansionModule;
use App\ModuleRawData;
use App\Expansion;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    protected $module_config_args = [
      'host',
      'port',
    ];


    public static function pollModules(){
      $measurement = self::create();
      $modules = ExpansionModule::where('is_active', 1)->get();
      $result = false;

      foreach ($modules as $module) {
        $expansion = Expansion::module($module);
        $data = $measurement->pollModule($module);

        if (strlen($data)>$expansion->min_length) {

          ModuleRawData::create([
            'measurement_id'=>$measurement->id,
            'expansion_module_id'=>$module->id,
            'data'=>$data
          ]);

          $result = true;
        } else {
          if (!$module->is_optional) {
            $measurement->setInvalid();
            return false;
          }
        }
      }

      if(!$result){
        $measurement->setInvalid();
      }

      return $result;
    }

    public function pollModule(ExpansionModule $module){
      $driver = 'driver.py';

      if (isset($module->config['driver'])){
        $driver = $module->config['driver'];
      }

      $arguments = '';

      foreach ($this->module_config_args as $argument){
        if (isset($module->config[$argument])){
          $arguments .= ' '.$module->config[$argument];
        }
      }

      $engine = Expansion::engine($module);

      $command = escapeshellcmd(
        $engine.' resources/modules/'.
        $module->alias.
        '/'.$driver.$arguments
      );
      $output = shell_exec("timeout 10s "+$command);
      return $output;
    }

    public static function processRaw(){
      $unprocessed = self::getUnprocessed();


      foreach($unprocessed as $measurement){
        $data=[];

        foreach ($measurement->rawData as $rawData){
          $module = $rawData->module;


          foreach ($module->devices as $device){


            foreach (Expansion::sensors($module, $device) as $param => $sensor){
              preg_match(
                "/".Expansion::mask($device, $param)."/",
                $rawData->data,
                $matches
              );

              // echo Expansion::mask($device, $param);
              // print_r($rawData->data);

              if (count($matches) > 1){
                $s_value = $matches[1];


                eval(Expansion::rule($device, $param));

                echo Expansion::rule($device, $param);

                echo "$param => $value\r\n";

                $data[$param] = $value;
              }
            }
          }
        }
        if ($data){
          StationData::create([
            'measured_at' => $measurement->measured_at,
            'data' => $data,
          ]);
        }
        $measurement->setProcessed();
      }
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
      return self::where('is_valid', true)->whereNull('processed_at')->get();
    }
}
