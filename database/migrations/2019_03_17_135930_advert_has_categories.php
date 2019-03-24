<?php

use App\Advert;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdvertHasCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $advertTable = (new Advert())->getTable();
        $advertCategoryTable = (new \App\AdvertCategory())->getTable();
        $advertHasCategories = (new \App\AdvertHasCategories())->getTable();

        Schema::create($advertHasCategories, function (Blueprint $blueprint) use ($advertCategoryTable, $advertTable) {
            $blueprint->bigIncrements('id');

            $blueprint->unsignedBigInteger('category');
            $blueprint->unsignedBigInteger('advert');

            $blueprint->foreign('category')->references('id')->on($advertCategoryTable)->onDelete('cascade');
            $blueprint->foreign('advert')->references('id')->on($advertTable)->onDelete('cascade');
        });

        Schema::table($advertTable, function (Blueprint $blueprint) use ($advertTable) {
            if(Schema::hasColumn($advertTable, 'category'))
            {
                $blueprint->dropForeign('adverts_category_foreign');
                $blueprint->dropColumn('category');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $advertTable = (new Advert())->getTable();
        $advertCategoryTable = (new \App\AdvertCategory())->getTable();
        $advertHasCategories = (new \App\AdvertHasCategories())->getTable();

        Schema::dropIfExists($advertHasCategories);
        Schema::table($advertTable, function (Blueprint $blueprint) use ($advertTable, $advertCategoryTable) {
            if(Schema::hasColumn($advertTable, 'category'))
                return;

            $blueprint->unsignedBigInteger('category');
            $blueprint->foreign('category')->references($advertCategoryTable)->on('id')->onDelete('cascade');
        });
    }
}
