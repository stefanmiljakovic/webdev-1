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

        Schema::create($advertCategoryTable, function (Blueprint $blueprint) {
            $blueprint->bigIncrements('id');
            $blueprint->string('name');
            $blueprint->timestamps();
        });

        Schema::create($advertTable, function (Blueprint $blueprint) use ($userExtendedTable, $advertCategoryTable) {
            $blueprint->bigIncrements('id');

            $blueprint->string('title');
            $blueprint->text('description');
            $blueprint->timestamps();

            $blueprint->unsignedBigInteger('category');
            $blueprint->foreign('category')->references('id')->on($advertCategoryTable)->onDelete('cascade');

            $blueprint->unsignedBigInteger('user');
            $blueprint->foreign('user')->references('id')->on($userExtendedTable)->onDelete('cascade');
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
        $advertTable = (new \App\Advert())->getTable();

        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists($advertCategoryTable);
        Schema::dropIfExists($advertTable);

        Schema::enableForeignKeyConstraints();
    }
}
