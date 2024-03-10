<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_amount', 'status', 'order_code'];

    public const STATUS_PENDING = 'pending';
    public const STATUS_PURCHASED = 'completed';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_FAILED = 'cancelled';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'orders_products')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }

    public static function generateUniqueCode()
    {
        return  'ORD-' . Str::uuid();
    }
}
