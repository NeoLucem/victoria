<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'string'; // Ensure the primary key is treated as a string
    public $incrementing = false; // Disable auto-incrementing for UUIDs

    protected $fillable = [
        'restaurant_id',
        'tablette_id',
        'user_id',
        'reservation_date',
        'status',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    // public function tablette()
    // {
    //     return $this->belongsTo(Tablette::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Automatically generate a UUID for the `id` field
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) \Illuminate\Support\Str::uuid();
        });
    }
}
