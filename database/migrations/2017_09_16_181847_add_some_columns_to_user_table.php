<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeColumnsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->after('remember_token');
            $table->integer('city_id')->after('address')->nullable()->unsigned();
            $table->integer('cnic1')->after('city_id');
            $table->bigInteger('cnic2')->after('cnic1');
            $table->integer('cnic3')->after('cnic2');
            $table->bigInteger('mobile')->after('cnic3');
            $table->string('designation')->after('mobile');
            $table->string('image')->after('designation');
            $table->string('thumb')->after('image');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
