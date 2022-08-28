<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'oder';
    protected $fillable = ['order_id','name','phone_number','address_street','address','subtotal','payment','users_id'];
}
