<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertHasCategories extends \Eloquent
{

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Advert|Advert[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function getAdvert()
    {
        return Advert::find($this->advert);
    }

    /**
     * @return AdvertCategory|AdvertCategory[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function getCategory()
    {
        return AdvertCategory::find($this->category);
    }
}
