<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];



    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function userRole()
    {
        return $this->belongsToMany(UserRole::class);
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     // Automatically generate a UUID for the `id` field
    //     static::creating(function ($model) {
    //         if (empty($model->id)) {
    //             $model->id = (string) Str::uuid();
    //         }
    //     });
    // }
}
