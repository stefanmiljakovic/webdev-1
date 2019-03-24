<?php

namespace App;

use App\TreeModel\TreeModel;
use Illuminate\Database\Eloquent\Model;

class AdvertCategory extends \Eloquent
{
    use TreeModel;

    protected $fillable = [
        'name', 'parent_category'
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return AdvertCategory
     */
    public function getParentCategory()
    {
        if($this->parent_category)
            return static::find($this->parent_category);

        return null;
    }
}
