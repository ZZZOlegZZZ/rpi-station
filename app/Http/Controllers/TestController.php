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
}
