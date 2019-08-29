<?php

namespace App\Http\Controllers;
use App\Measurement;
use App\Expansion;
use App\StationData;

use Illuminate\Http\Request;

class StationDataController extends Controller
{
    public function index(Request $request){
      if ($request->ignore_is_read){
        $station_data = StationData::all();
      } else {
        $station_data = StationData::where('is_read', 0)->get();
      }

      if ($request->mark_as_read){
        foreach($station_data as $data_chunk){
          $data_chunk->update(['is_read' => true]);
        }
      }

      return $station_data;
    }


    public static function processRawData(){
      $unprocessed = Measurement::getUnprocessed();

      foreach($unprocessed as $measurement){
        $data=[];

        foreach ($measurement->rawData as $rawData){
          $module = $rawData->module;

          foreach ($module->devices as $device){

            foreach (Expansion::sensors($module, $device) as $param => $sensor){
              preg_match(
                "/".Expansion::mask($device, $param, $sensor)."/",
                $rawData,
                $matches
              );

              if (count($matches) > 1){
                $s_value = $matches[1];

                eval("$sensor->rule");

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
        //$measurement->setProcessed();
      }
    }
}
