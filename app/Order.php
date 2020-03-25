<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'payment_method',
        'status',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'jalan',
        'cart_notes',
        'address_notes',
        'user_id',
        'package_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
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
                'note'
            ]);
    }
}
