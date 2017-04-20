<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['url', 'title', 'price', 'image', 'category'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function wishListedBy()
    {
        return $this->belongsToMany(User::class);
    }
}
