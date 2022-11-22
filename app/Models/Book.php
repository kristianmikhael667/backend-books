<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['catalog', 'qtybook'];
    protected $table = 'book';
    public $incrementing = false;

    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id', 'uid');
    }

    public function qtybook()
    {
        return $this->hasOne(QuantityBook::class, 'uid_book', 'uid');
    }

    public function booksave()
    {
        return $this->hasOne(Bookborrow::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title_book', 'like', '%' . $search . '%')
                ->orWhere('author_book', 'like', '%' . $search . '%');
        });
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uid = Str::uuid();
        });
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_book'
            ]
        ];
    }
}
