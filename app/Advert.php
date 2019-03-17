<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $appends = [
        'title', 'description', 'category', 'user'
    ];

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
     * @return AdvertCategory
     */
    public function getCategory()
    {
       return AdvertCategory::where('id', $this->category);
    }

    /**
     * @return UserExtended
     */
    public function getUser()
    {
        return UserExtended::where('id', $this->user);
    }
}
