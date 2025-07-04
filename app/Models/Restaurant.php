<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Restaurant extends Model
{
    use HasFactory;

    protected $keyType = 'string'; // Ensure the primary key is treated as a string
    public $incrementing = false; // Disable auto-incrementing for UUIDs
    protected $primaryKey = 'id'; // Specify the primary key field

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'city',
        'email',
        'phone',
        'website',
        'description',
        'logo',
        'cover_image',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employee(){
        return $this->hasMany(Employee::class);
    }

    public function diningtable(){
        return $this->hasMany(Tablette::class);
    }
}
