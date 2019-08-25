<?php

namespace App;

class ExpansionModule
{
    public static function all()
    {
      $modules = json_decode(file_get_contents('resources/modules/modules.json'));
      return $modules->modules;
    }

    public static function module($alias){
      return json_decode(file_get_contents('resources/modules/'.$alias.'/module.json'));
    }

    public static function modules(){
      $aliases = self::all();
      foreach ($aliases as $alias){
        $modules[] = self::module($alias);
      }
      return $modules;
    }
}
