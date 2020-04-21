<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'name',
    'description',
    'price',
    'photo',
    'type',
  ];

  public $daftar = [
    'type' => [
      'reguler',
      'ready to cook',
      'snack & beverage'
    ],
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function orders()
  {
    return $this->belongsToMany(Order::class)
      ->withPivot([
        'total',
        'status',
        'antar',
        'optional'
      ]);
  }
}
