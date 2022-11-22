<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bookborrow extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'bookborrow';
    protected $with = ['books', 'users'];
    public $incrementing = false;

    public function books()
    {
        return $this->belongsTo(Book::class, 'book_uid', 'uid');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_uid', 'uid');
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
}
