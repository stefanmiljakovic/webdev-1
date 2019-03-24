<?php

namespace App\Http\Controllers\Adverts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertCategory extends Controller
{
    public function getList(Request $request)
    {
        $categories = \App\AdvertCategory::all();

        return response()->json($categories);
    }

    /**
     * @param AdvertCategory[]|null $categories
     * @return AdvertCategory[]
     */
    protected function getTreeList($categories = null)
    {
        if($categories === null)
            $categories = \App\AdvertCategory::whereNull('parent_category')->get()->all();

        foreach($categories as $category)
        {
            /** @var \App\AdvertCategory $category */
            $children = \App\AdvertCategory::where('parent_category', '=', $category->getId())->get()->all();

            if(sizeof($children) > 0)
                $this->getTreeList($children);

            foreach($children as $child) {
                $category->addChild($child);
            }
        }

        return $categories;
    }
}