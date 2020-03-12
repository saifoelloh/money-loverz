<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'id',
      'name',
      'description',
      'price',
      'photo',
      'numbers_of_items',
    ];
}
