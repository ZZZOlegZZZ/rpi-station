<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
  protected $casts = [
    'config' => 'array',
    'properties' => 'array',
  ];
}
