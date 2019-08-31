<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpansionModule extends Model
{
    public $timestamps = false;

    protected $guarded = [];
    

    protected $casts = [
      'config' => 'array',
      'properties' => 'array',
    ];

    public function devices(){
      return $this->hasMany(Device::class);
    }
}
