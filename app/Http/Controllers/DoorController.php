<?php

namespace App\Http\Controllers;

use App\Door;
use Illuminate\Http\Request;

class DoorController extends Controller
{
  public function index(){
    return Door::latest()->first();
  }

  public function doorStatus(Int $status){
    if ($status != 1 && $status != 0){
      return response()->json(['errors' =>
        ['status_failed' => [
          'error' => 'Bad status code',
          'message' => 'Status must be in range[0, 1]'
        ]]], 422);
    }

    return Door::create([
      'is_opened' => $status,
    ]);
  }
}
