<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Expansion;

class Device extends Model
{
  public $timestamps = false;

  protected $casts = [
    'config' => 'array',
    'properties' => 'array',
  ];

  public function module(){
    return $this->belongsTo(ExpansionModule::class, 'expansion_module_id');
  }

  public function sensors(){
    return Expansion::sensors($this->module, $this);
  }
}
