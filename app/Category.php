<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'discount','exclusive'
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
