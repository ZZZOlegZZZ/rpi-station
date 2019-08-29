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

    public static function mask(Device $device, $param, $sensor){
      try {
        if (gettype($sensor->mask)=='string'){
          return $sensor->mask;
        } else {
          return $sensor->mask->{$device->config[$param]};
        }
      }
      catch (\Exception $e){
        return null;
      }
    }
}
