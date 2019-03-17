<?php

namespace App\Helper;

class BladeArguments
{

    /** @var array */
    protected $_arguments;

    public function __construct($defaultArguments)
    {
        $this->_arguments = $defaultArguments;
    }

    public function purgeArguments($arguments)
    {
        foreach($arguments as $key => $value)
        {
            $this->_arguments[$key] = $value;
        }

        return $this;
    }

    public function getArguments()
    {
        return $this->_arguments;
    }
}