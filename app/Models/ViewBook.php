<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ViewBook extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'viewbook';
    public $incrementing = false;

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
