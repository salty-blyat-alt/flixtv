<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_id';
    public $timestamps = false;

    protected $fillable = [
        'customer_name',
        'contact_name',
        'address',
        'city',
        'postal_code',
        'country',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
