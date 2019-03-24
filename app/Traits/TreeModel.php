<?php

namespace App\TreeModel;

trait TreeModel {

    /** @var static static[]  */
    protected $children = array();

    /**
     * @param static $child
     */
    public function addChild($child)
    {
        array_push($children, $child);
    }

    /**
     * @param int $index
     * @return static
     */
    public function getChild($index)
    {
        return $this->children[$index];
    }

    /**
     * @return TreeModel
     */
    public function getChildren()
    {
        return $this->children;
    }
}