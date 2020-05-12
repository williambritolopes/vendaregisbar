<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function product()
    {
        return $this->belongsToMany(Product::class);

    }

    public function category()
    {
        return $this->belongsToMany(Category::class);

    }
}
