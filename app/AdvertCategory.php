<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertCategory extends Model
{
    protected $appends = [
        'name'
    ];

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
