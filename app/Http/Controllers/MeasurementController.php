<?php

namespace App\Http\Controllers;

use App\Measurement;
use App\ExpansionModule;
use App\ModuleRawData;
use App\Expansion;

use Illuminate\Http\Request;

class MeasurementController extends Controller
{
  public static function poll(){
    $measurement = Measurement::create();
    $modules = ExpansionModule::where('is_active', 1)->get();
    $result = false;

    foreach ($modules as $module) {
      $expansion = Expansion::module($module);
      $data = $measurement->pollDevice($module);

      if (strlen($data)>$expansion->min_length) {

        ModuleRawData::create([
          'measurement_id'=>$measurement->id,
          'expansion_module_id'=>$module->id,
          'data'=>$data
        ]);

        $result = true;
      } else {
        if (!$module->is_optional) {
          $measurement->setInvalid();
          return false;
        }
      }
    }

    if(!$result){
      $measurement->setInvalid();
    }

    return $result;
  }
}
