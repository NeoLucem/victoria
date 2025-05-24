<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'string'; // Ensure the primary key is treated as a string
    public $incrementing = false; // Disable auto-incrementing for UUIDs

    protected $fillable = [
        'order_id',
        'restaurant_id',
        'total_amount',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        // Automatically generate a UUID for the `id` field
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) \Illuminate\Support\Str::uuid();
        });
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
