<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $keyType = 'string'; // Ensure the primary key is treated as a string
    public $incrementing = false; // Disable auto-incrementing for UUIDs
    protected $primaryKey = 'id'; // Specify the primary key field

    protected $fillable = [
        'restaurant_id',
        'table_id',
        'total_amount',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        // Automatically generate a UUID for the `id` field
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function table()
    {
        return $this->belongsTo(Tablette::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // public function invoice(){
    //     return $this->hasOne(Invoice::class);
    // }
}
