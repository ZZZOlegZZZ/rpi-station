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
      $data = StationData::orderBy('id', 'desc')->first()->data;


      if ($data->power_source<=1){
        return ['power_status'=>null];
      }

      if (!$data->input_voltage){
        return ['power_status'=>'Нет сети']; //Нет сети
      }

      return ['power_status'=>'Выключен автомат питания']; ////Выключен автомат питания
    }

    public static function alertGroups(){
      return json_decode(file_get_contents('../resources/alerts/alerts.json'))->groups;
    }
}
