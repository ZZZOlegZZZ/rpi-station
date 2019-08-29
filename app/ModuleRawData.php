<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ModuleRawData extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function measurement() {
      return $this->belongsTo(Measurement::class);
    }

    public function module() {
      return $this->belongsTo(ExpansionModule::class, 'expansion_module_id');
    }
}
