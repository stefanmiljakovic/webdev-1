<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdverts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $advertCategoryTable = (new \App\AdvertCategory())->getTable();
        $advertTable = (new \App\Advert())->getTable();
        $userExtendedTable = (new \App\UserExtended())->getTable();

        Schema::create($advertTable, function(Blueprint $blueprint) use ($userExtendedTable, $advertCategoryTable)
        {
            $blueprint->string('title');
            $blueprint->text('description');
            $blueprint->foreign('category')->references('id')->on($advertCategoryTable);
            $blueprint->foreign('user')->references('id')->on($userExtendedTable);
        });

        Schema::create($advertCategoryTable, function(Blueprint $blueprint)
        {
           $blueprint->string('name');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
