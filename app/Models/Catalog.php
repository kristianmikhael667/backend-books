<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Catalog extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $table = 'catalog';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uid = Str::uuid();
        });
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_catalog'
            ]
        ];
    }
}
