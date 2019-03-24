<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdvertImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $advertImageTable = (new \App\AdvertImage())->getTable();
        $advertTable = (new \App\Advert())->getTable();

        Schema::create($advertImageTable, function(Blueprint $blueprint) use ($advertTable) {
           $blueprint->string('image_url');
           $blueprint->unsignedInteger('position');

           $blueprint->unsignedBigInteger('advert');
           $blueprint->foreign('advert')->references('id')->on($advertTable)->onDelete('cascade');

           $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $advertImageTable = (new \App\AdvertImage())->getTable();

        Schema::dropIfExists($advertImageTable);
    }
}
