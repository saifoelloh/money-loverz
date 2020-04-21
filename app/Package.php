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
    'type',
  ];

  public $daftar = [
    'type' => [
      'reguler',
      'ready to cook',
      'snack & beverage'
    ],
  ];

  public function orders()
  {
    return $this->hasMany(Order::class);
  }
}
