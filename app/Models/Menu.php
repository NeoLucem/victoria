<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Menu extends Model
{
    use HasFactory; 
    
    protected $fillable = [
        'restaurant',
        'name',
        'description',
        'status'
    ];

    protected $keyType = 'string'; // Ensure the primary key is treated as a string
    public $incrementing = false; // Disable auto-incrementing for UUIDs
    protected $primaryKey = 'id'; // Specify the primary key field

    protected static function boot()
    {
        parent::boot();

        // Automatically generate a UUID for the `id` field
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) \Illuminate\Support\Str::uuid();
            }
        });
    }

    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
