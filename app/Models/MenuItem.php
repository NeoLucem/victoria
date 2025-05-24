<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuItem extends Model
{

    use HasFactory;

    protected $keyType = 'string'; // Ensure the primary key is treated as a string
    public $incrementing = false; // Disable auto-incrementing for UUIDs
    protected $primaryKey = 'id'; // Specify the primary key field

    protected $fillable = [
        'menu_id',
        'name',
        'description',
        'price',
        'status',
        'image',
        'category',
        'preparation_time',
        'stock',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }   

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
}
