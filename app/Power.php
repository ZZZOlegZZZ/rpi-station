<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    protected $guarded = [];

    public static function getStatus(){
      $module = ExpansionModule::where('alias','mercury-206')->first();
      $measurement = new Measurement;
      $rawData = $measurement->pollModule($module);
      $data=[];

      foreach($module->devices as $device){
        foreach (Expansion::sensors($module, $device) as $param => $sensor){
          preg_match(
            "/".Expansion::mask($device, $param)."/",
            $rawData,
            $matches
          );


          if (count($matches) > 1){
            $s_value = $matches[1];


            eval(Expansion::rule($device, $param));

            $data[$param] = $value;
          }
        }
        if ($data['input_voltage'] && $data['input_current']){
          $status = 0;
        } elseif($data['input_voltage'] && intval($data['input_current']==0)){
          $status = 1; //Автомат
        } else {
          $status = 2; //Сеть
        }

        Power::updateOrCreate(['id' => 1], ['status' => $status]);
        return $status;
      }
    }
}
