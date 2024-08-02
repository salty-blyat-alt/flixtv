<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';
    public $timestamps = false;
    protected $fillable = [
        'product_name',
        'category_id',
        'unit',
        'price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
}
