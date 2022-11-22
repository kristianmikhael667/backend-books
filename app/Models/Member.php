<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Member extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['members'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uid = Str::uuid();
        });
    }

    public function members()
    {
        return $this->belongsTo(User::class, 'phone', 'phone');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
}
