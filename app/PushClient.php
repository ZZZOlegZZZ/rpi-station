<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client as GzClient;

class PushClient extends Model
{
    protected $guarded=[];

    public static function pushData() {
      $gzclient = new GzClient();

      foreach (self::all() as $client){
        $station_id = $client->station_id
          ?$client->station_id
          :Configuration::find(1)->station_id;

        foreach(StationData::unsent($client) as $data) {
          $response = $gzclient->request($client->method,
            'https://'.
            $client->host."/".
            $client->uri, [
              'form_params' => [
                'station_id' => $station_id,
                'measured_at' => date("Y-m-d H:i:s", strtotime($data->measured_at)),
                'data' => json_encode($data->data),
            ]
          ]);

          if($response->getStatusCode() == 200) {
            $client->last_sent_data_id = $data->id;
            $client->save();
          } else {
            break;
          }
        }
      }
    }
}
