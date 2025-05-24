<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApiKey extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'restaurant_id',
        'key',
        'description',
        'status',
    ];

    protected $casts = [
        'restaurant_id' => 'uuid',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Automatically generate a UUID for the `id` field
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
                $model->key = Str::random(32); // Generate a random key
            }
        });
    }
}
