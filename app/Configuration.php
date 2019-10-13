<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $guarded = [];

    public static function setId($station_id){
      return self::updateOrInsert(
        ['id'=>1],
        ['station_id'=>$station_id]
      );
    }
}
