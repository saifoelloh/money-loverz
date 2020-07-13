<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'payment_method',
        'status',
        'kecamatan',
        'alamat',
        'bukti',
        'waktu',
        'user_id',
        'customer_id',
        'package_id'
    ];

    public $daftar = [
        'payment_method' => [
            'cash on delivery',
            'transfer'
        ],
        'status' => [
            'created',
            'confirmed',
            'proceed',
            'completed',
            'canceled',
        ],
        'kecamatan' => [
            'banyumanik',
            'candhisari',
            'gajahmungkur',
            'gayamsari',
            'genuk',
            'pedurungan',
            'semarang kulon',
            'semarang kidul',
            'semarang tengah',
            'semarang wetan',
            'semarang lor',
            'tembalang',
            'tugu'
        ],
        'waktu' => [
          'dinner',
          'lunch',
          'dinner + lunch',
          'event',
        ]
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class)
            ->withPivot([
                'total',
                'status',
                'antar',
                'optional'
            ]);
    }
}
