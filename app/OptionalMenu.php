<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OptionalMenu extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'name',
      'category',
      'price'
    ];
}
