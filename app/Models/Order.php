<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $table = 'orders';

    protected $fillable = [
        'product_id',
        'username',
        'file',
        'status',
        'code',
        'used'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
