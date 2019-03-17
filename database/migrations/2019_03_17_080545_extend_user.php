<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtendUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {
            if(Schema::hasColumn($table->getTable(), 'name'))
                $table->dropColumn('name');

            /**
             * 'username', 'email', 'password', 'first_name', 'last_name',
             * 'address', 'area', 'phone_number', 'gender', 'age'
             */

            $table->string('username')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('gender')->nullable();
            $table->integer('age', false, true)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table)
        {
            if(!Schema::hasColumn($table->getTable(), 'name'))
                $table->string('name');

            $table->dropColumn('username');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('address');
            $table->dropColumn('area');
            $table->dropColumn('phone_number');
            $table->dropColumn('gender');
            $table->dropColumn('age');
        });
    }
}
