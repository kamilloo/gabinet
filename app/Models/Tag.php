<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $guarded = [];

    public function portfolio()
    {
        return $this->belongsToMany(Portfolio::class, 'portfolio_tag');
    }

    public function toArray()
    {
        return [
            $this->id => $this->name
        ];
    }

    static function tagsList()
    {
        return self::query()->get()->mapWithKeys(function($tag, $key){
            return [$tag->id => $tag->name];
        })->all();
    }
}
