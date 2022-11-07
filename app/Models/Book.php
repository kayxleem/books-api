<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'authors' => 'array',    
    ];
    

    public function scopeReleaseDate(Builder $query, $date): Builder
{
    return $query->where('release_date','LIKE', '%' . $date . '%');
}
}
