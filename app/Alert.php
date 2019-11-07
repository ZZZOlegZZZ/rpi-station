<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    public static function checkAlerts(){
      $station_data = new StationData;
      $alert_groups = self::alertGroups();
      $alerts = [];
      foreach ($alert_groups as $group) {
        foreach($group as $alert_alias => $alert_type){
          eval('$result = '.$alert_type->condition);
          if ($result){
            $alerts[$alert_alias] = [
              "title" => $alert_type->title,
            ];
          }

        }
      }
      return $alerts;
    }

    public static function powerStatus(){
      $module = ExpansionModule::where('alias','mercury-206')->first();
      $measurement = new Measurement;
      $rawData = $measurement->pollModule($module);
      $sensors = [
        "input_voltage" => [
          "mask" => "POWER\\s+(-*\\d+\\.*\\d*)",
          "rule" => "$value = $s_value;"
        ],
        "input_current" => [
          "mask" => "POWER\\s+\\S+\\s+(-*\\d+\\.*\\d*)",
          "rule" => "$value = $s_value;"
        ]
      ];
      $data=[];

      foreach($module->devices as $device){
        foreach ($sensors as $param => $sensor){
          preg_match(
            "/".$sensor['mask']."/",
            $rawData,
            $matches
          );


          if (count($matches) > 1){
            $s_value = $matches[1];


            eval($sensor['rule']);

            $data[$param] = $value;
          }
        }
        if ($data['input_voltage'] && $data['input_current']){
          return ['power_status'=> null];
        } elseif($data['input_voltage'] && $data['input_current']==0){
          return ['power_status'=>'Выключен автомат питания'];
        } else {
          return ['power_status'=>'Нет сети'];
        }
      }
      // $data = StationData::orderBy('id', 'desc')->first()->data;
      //
      //
      // if ($data->power_source<=1){
      //   return ['power_status'=>null];
      // }
      //
      // if (!$data->input_voltage){
      //   return ['power_status'=>'Нет сети']; //Нет сети
      // }
      //
      // return ['power_status'=>'Выключен автомат питания']; ////Выключен автомат питания
    }

    public static function alertGroups(){
      return json_decode(file_get_contents('../resources/alerts/alerts.json'))->groups;
    }
}
