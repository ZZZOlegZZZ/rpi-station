<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function execTest(){
      $command = escapeshellcmd('python3 ../resources/modules/drivers/test.py');
      $output = shell_exec($command);
      dd ($output);
    }

    public function evalTest(){
      $x = 5;
      eval('$y=$x*5;');
      return $y;
    }

    public function modules(){
      $modules = json_decode(file_get_contents('../resources/modules/modules.json'));
      dd ($modules->modules);
    }
}
