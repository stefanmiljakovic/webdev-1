<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdvertCategoryParentId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $advertCategoryTable = (new \App\AdvertCategory())->getTable();

        Schema::table($advertCategoryTable, function(Blueprint $blueprint) use ($advertCategoryTable) {
           $blueprint->unsignedBigInteger('parent_category')->nullable()->default(null);
           $blueprint->foreign('parent_category')->references('id')->on($advertCategoryTable)
               ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $advertCategoryTable = (new \App\AdvertCategory())->getTable();

        Schema::table($advertCategoryTable, function(Blueprint $blueprint) use ($advertCategoryTable) {
            $blueprint->dropForeign('parent_category');
           $blueprint->dropColumn('parent_category');
        });
    }
}
