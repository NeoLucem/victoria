<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserRole extends Model
{
    use HasFactory;
    protected $keyType = 'string'; // Ensure the primary key is treated as a string
    public $incrementing = false; // Disable auto-incrementing for UUIDs
    protected $primaryKey = 'id'; // Specify the primary key field

    protected $fillable = [
        'id',
        'user_id',
        'role_id',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

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
