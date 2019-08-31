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

}
