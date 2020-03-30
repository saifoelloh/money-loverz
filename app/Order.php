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
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'jalan',
        'cart_notes',
        'address_notes',
        'user_id',
        'customer_id',
        'package_id'
    ];

    public $daftarStatus = [
        'menunggu konfirmasi',
        'terkonfirmasi',
        'terbayar',
        'sedang berjalan',
        'selesai',
        'batal'
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
                'note',
                'antar'
            ]);
    }
}
