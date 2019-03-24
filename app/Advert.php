<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AdvertHasCategories;

class Advert extends \Eloquent
{
    protected $fillable = [
        'title', 'description', 'category', 'user'
    ];

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @deprecated DO NOT USE AFTER LATEST MIGRATION
     * @return AdvertCategory
     */
    public function getCategory()
    {
       return AdvertCategory::find($this->category);
    }

    /**
     * @return UserExtended
     */
    public function getUser()
    {
        return UserExtended::find($this->user);
    }

    /**
     * @return AdvertImage[]
     */
    public function getImages()
    {
        return AdvertImage::where('advert', '=', $this->id)->get()->all();
    }

    /**
     * @return AdvertImage[]
     */
    public function getSortedImages()
    {
       return AdvertImage::where('advert', '=', $this->id)->getQuery()
           ->orderBy('position', 'desc')->get()->all();
    }

    /**
     * @return AdvertCategory[]
     */
    public function getCategories()
    {
        $bindings = AdvertHasCategories::where('advert', '=', $this->getId())->get()->all();
        $categories = array();

        foreach($bindings as $bind)
        {
            /** @var AdvertHasCategories $bind */
            array_push($categories, $bind->getCategory());
        }

        return $categories;
    }
}
