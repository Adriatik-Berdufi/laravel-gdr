<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'description'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($type) {
            $type->slug = Str::slug($type->name);
        });
    }

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    public function getSeparatedText()
    {
        return explode('###', $this->description);
    }
}
