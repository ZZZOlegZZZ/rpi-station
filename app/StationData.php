<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StationData extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    protected $casts = [
      'data' => 'object'
    ];

    public function last($position = 0){
      return $this->orderBy('id','DESC')->skip($position)->first()->data;
    }

    public function dailyAvgTairZeroCross(){
      $y_t_air = $this->select('data')
        ->whereRaw('DATE("measured_at") = DATE(datetime("now","-1 day"))')
        ->get()->pluck('data')->pluck('t_air')->avg();

      $by_t_air = $this->select('data')
        ->whereRaw('DATE("measured_at") = DATE(datetime("now","-2 day"))')
        ->get()->pluck('data')->pluck('t_air')->avg();

      return $by_t_air>=0 && $y_t_air<0;
    }

    public function precipSum($nhour){
      $data = $this
        ->whereRaw('measured_at > datetime("now","-'.$nhour.' hour")')
        ->get()->pluck('data');


      $rain = 0;
      $snow = 0;
      $snow_rain = 0;

      foreach ($data as $chunk){

        if ($chunk->precipitation_type==1 || $chunk->precipitation_type==5){
          $rain += $chunk->precipitation_amount;
        } elseif ($chunk->precipitation_type==2){
          $snow += $chunk->precipitation_amount;
        } elseif ($chunk->precipitation_type==3){
          $snow_rain += $chunk->precipitation_amount;
        }
      }

      return [
        'rain' => $rain,
        'snow' => $snow,
        'snow_rain' => $snow_rain,
      ];

    }

    public function tAirDiff($nhour){
      $data = $this
        ->whereRaw('measured_at > datetime("now","-'.$nhour.' hour")')
        ->get()->pluck('data')->pluck('t_air');

      return $data->max() - $data->min();
    }

    public static function test(){
      self::create([
        'data'=>json_encode(["t_air"=>10.2]),
      ]);
    }

    public static function unsent($client){
      return self::orderBy('id', 'desc')->limit(1)->get();
      return self::where(
        'id',
        '>',
        $client->last_sent_data_id?$client->last_sent_data_id:0
      )->get();
    }
}
