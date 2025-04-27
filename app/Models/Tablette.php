<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tablette extends Model
{
    protected $keyType = 'string'; // Ensure the primary key is treated as a string
    public $incrementing = false; // Disable auto-incrementing for UUIDs
    protected $primaryKey = 'id'; // Specify the primary key field

    protected $fillable = [
        'restaurant_id',
        'table_number',
        'status'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    // public function orders()
    // {
    //     return $this->hasMany(Order::class);
    // }
    // public function reservations()
    // {
    //     return $this->hasMany(Reservation::class);
    // }
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
}
