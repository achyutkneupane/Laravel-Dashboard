<?php

namespace AchyutN\Dashboard\Traits;

trait HasTheSlug
{
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}