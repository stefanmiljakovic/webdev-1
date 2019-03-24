<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = $this->getData();

        foreach($data as $entry)
        {
            \App\AdvertCategory::create($entry);
        }
    }

    protected function getData()
    {
        return array(
          ['name' => 'Cars'], ['name' => 'Computers'], ['name' => 'Phones'], ['name' => 'Houses']
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $data = $this->getData();

        foreach($data as $entry)
        {
            \App\AdvertCategory::where('name', '=', $entry)->delete();
        }
    }
}
