<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';

    protected $fillable = ['url', 'code', 'shorten', 'hits'];

    public function scopeSearch($query, $name)
    {
        return $query
            ->where('url', 'like', '%' .$name. '%')
            ->orWhere('code', 'like', '%' .$name. '%')
            ->orWhere('shorten', 'like', '%' .$name. '%');
    }
}
