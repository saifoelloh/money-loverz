<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MenuOrder extends Pivot
{
    protected $fillable = [
        'total',
        'status',
        'optional',
        'antar'
    ];

    public $daftar = [
        'optional' => [
            'kentang rebus',
            'nasi merah',
            'nasi kuning'
        ],
        'status' => [
            'order',
            'cancel',
            'done'
        ]
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
