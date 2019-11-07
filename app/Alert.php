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
      $data = Power::findOrFail(1);

      if ($data->status == 0){
        return ['power_status'=>null];
      }

      if ($data->status == 1){
        return ['power_status'=>'Выключен автомат питания']; ////Выключен автомат питания
      }

      if ($data->status == 2){
        return ['power_status'=>'Нет сети']; //Нет сети
      }


    }

    public static function alertGroups(){
      return json_decode(file_get_contents('../resources/alerts/alerts.json'))->groups;
    }
}
