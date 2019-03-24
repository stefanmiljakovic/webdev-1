<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMultiLevelCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categoryTable = (new \App\AdvertCategory())->getTable();

        if (Schema::hasTable($categoryTable)) {
            $data = $this->getData();
            $this->doInserts($data);
        }
    }

    protected function getData()
    {
        return array(
            [
                'Cars' => [
                    'Ferrari' => [
                        'Gucci',
                        'Prada'
                    ],
                    'Bueno' => [
                        'Muyo Bueno' => [
                            'Sehr Bueno'
                        ]
                    ]
                ],
                'Computers' => [
                    'PC' => [
                        'Intel',
                        'AMD'
                    ],
                    'Laptop' => [
                        'Bitten Apple' => [
                            'Overpriced',
                            'Very overpriced'
                        ],
                        'Windows'
                    ]
                ],
                'Phones' => [
                    'Bitten Apple',
                    'Android'
                ],
                'Houses' => [
                    'Mansions',
                    'Flats',
                    'Rent'
                ],
            ]
        );
    }

    protected function doInserts($data, $parent = null)
    {
        foreach ($data as $index => $entry) {

            if (is_string($index)) {
                $this->singleInsert($index, $parent);
            }

            if (is_array($entry))
                $this->doInserts($entry, $index);
            else
                $this->singleInsert($entry, $parent);
        }
    }

    protected function singleInsert($data, $parent)
    {
        if (!\App\AdvertCategory::where('name', '=', $data)->exists() &&
            !is_integer($data)) {

            /** @var \App\AdvertCategory $parentCategory */
            $parentCategory = \App\AdvertCategory::where('name', '=', $parent)->first();

            $args = [
                'name' => $data
            ];

            if ($parentCategory)
                $args['parent_category'] = (string)$parentCategory->getId();

            \App\AdvertCategory::create($args);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $categoryTable = (new \App\AdvertCategory())->getTable();

        if (Schema::hasTable($categoryTable)) {
            $data = $this->getData();
            $this->doDeletes($data);

        }
    }

    protected function doDeletes($data, $parent = null)
    {
        foreach ($data as $value) {
            if (\App\AdvertCategory::where('name', '=', $value)->exists())
                \App\AdvertCategory::where('name', '=', $value)->forceDelete();

            if (is_array($value))
                $this->doDeletes($value);
        }
    }
}
