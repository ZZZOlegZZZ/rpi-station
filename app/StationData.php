<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StationData extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    protected $casts = [
      'data' => 'array'
    ];

    public static function test(){
      self::create([
        'data'=>json_encode(["t_air"=>10.2]),
      ]);
    }

}
