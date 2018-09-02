<?php

namespace App\Models;


use App\Models\Model;

class Category extends Model
{
    protected $fillable =  ['name', 'icon'];

    public function toHtml()
    {
        $to_spans = collect(explode(' ', $this->name))->map(function($part){
            return "<span>{$part}</span>";
        })->all();

        return implode($to_spans);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}

