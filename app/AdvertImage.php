<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertImage extends \Eloquent
{
    protected $fillable = [
      'image_url', 'advert', 'position'
    ];

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * @return Advert
     */
    public function getAdvert()
    {
        return Advert::find($this->advert);
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }
}
