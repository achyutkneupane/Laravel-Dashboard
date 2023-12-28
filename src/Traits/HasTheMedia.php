<?php

namespace AchyutN\Dashboard\Traits;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait HasTheMedia
{
    use InteractsWithMedia;
    public function cover()
    {
        return $this->getMedia('cover')->count() ? $this->getMedia('cover')->last()->getUrl() : null;
    }

    public function small_cover()
    {
        return $this->getMedia('cover')->count() ? $this->getMedia('cover')->last()->getUrl('small') : null;
    }

    public function medium_cover()
    {
        return $this->getMedia('cover')->count() ? $this->getMedia('cover')->last()->getUrl('medium') : null;
    }

    public function big_cover()
    {
        return $this->getMedia('cover')->count() ? $this->getMedia('cover')->last()->getUrl('big') : null;
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('small')
            ->format(Manipulations::FORMAT_WEBP)
            ->width(150)
            ->height(80)
            ->nonQueued();
        $this->addMediaConversion('medium')
            ->format(Manipulations::FORMAT_WEBP)
            ->width(300)
            ->height(160)
            ->nonQueued();
        $this->addMediaConversion('big')
            ->format(Manipulations::FORMAT_WEBP)
            ->width(800)
            ->height(420)
            ->nonQueued();
    }
}