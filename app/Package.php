<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'name',
    'description',
    'price',
    'photo',
    'total_items',
  ];

  public function orders()
  {
    return $this->hasMany(Order::class);
  }
}
