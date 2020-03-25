<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MenuOrder extends Pivot
{
    protected $fillable = [
        'total',
        'status',
        'note',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
