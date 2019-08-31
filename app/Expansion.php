<?php

namespace App;


class Expansion
{
    public static function all()
    {
      $modules = json_decode(file_get_contents('resources/modules/modules.json'));
      return $modules->modules;
    }

    public static function module(ExpansionModule $module){
      return json_decode(file_get_contents('resources/modules/'.$module->alias.'/module.json'));
    }

    public static function modules(){
      $em = ExpansionModule::all();

      foreach ($em as $module){
        $modules[] = self::module($module);
      }

      return $modules;
    }

    public static function devices(ExpansionModule $module){
      return self::module($module)->devices;
    }

    public static function sensors(ExpansionModule $module, Device $device){
      return self::devices($module)->{$device->alias}->sensors;
    }

    public static function mask(Device $device, String $sensor){
      try {
        if (gettype($device->sensors()->$sensor->mask)=='string'){
          return $device->sensors()->$sensor->mask;
        } else {
          return $device->sensors()->$sensor->mask->{$device->config['mask'][$sensor]};
        }
      }
      catch (\Exception $e){
        return null;
      }
    }

    public static function rule(Device $device, String $sensor){
      try {
        if (gettype($device->sensors()->$sensor->rule)=='string'){
          return $device->sensors()->$sensor->rule;
        } else {
          return $device->sensors()->$sensor->rule->{$device->config['rule'][$sensor]};
        }
      }
      catch (\Exception $e){
        return null;
      }
    }
}
