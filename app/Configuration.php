<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $guarded = [];

    protected $casts = [
      'settings' => 'object',
      'alerts' => 'object',
    ];

    public static function setId($station_id){
      return self::updateOrInsert(
        ['id'=>1],
        ['station_id'=>$station_id]
      );
    }

    public static function setSettings($settings){
      if ($configuration = self::find(1)){
        if ($configuration->update([
          'settings' => $settings,
        ])){
          return true;
        }
        return false;
      }
      return false;
    }
}
