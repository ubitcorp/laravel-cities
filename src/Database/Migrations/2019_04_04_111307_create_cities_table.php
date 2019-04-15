<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 

        Schema::create('timezones', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");  
        });

        Schema::create('continents', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name"); 
            $table->text("translations")->nullable();
            $table->string("code",2);
        });

        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('continent_id');
            $table->string("name");
            $table->text("translations")->nullable(); 
            $table->string("iso2");
            $table->string("iso3");
            $table->string("phone_code");
            $table->foreign('continent_id')
            ->references('id')
            ->on('continents')
            ->onDelete('restrict');            
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id'); 
            $table->unsignedInteger('country_id');
            $table->string("div1_code")->nullable();
            $table->string("div1_name")->nullable();
            $table->string("div2_code")->nullable();
            $table->string("div2_name")->nullable();
            $table->string("name")->nullable();
            $table->string("lat")->nullable();
            $table->string("long")->nullable();
            $table->unsignedInteger('timezone_id');
            $table->foreign('country_id')
            ->references('id')
            ->on('countries')
            ->onDelete('restrict');
            $table->foreign('timezone_id')
            ->references('id')
            ->on('timezones')
            ->onDelete('restrict');
        });


        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('city_id');
            $table->string("name"); 
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('restrict');
        });

        Schema::create('city_model', function (Blueprint $table) {
            $table->unsignedInteger('city_id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->index(['model_id', 'model_type']);
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('restrict');
            $table->primary(['city_id', 'model_id', 'model_type']);
        });  

        Schema::create('district_model', function (Blueprint $table) {
            $table->unsignedInteger('district_id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->index(['model_id', 'model_type']);
            $table->foreign('district_id')
                ->references('id')
                ->on('districts')
                ->onDelete('restrict');
            $table->primary(['district_id', 'model_id', 'model_type']);
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('district_model');
        Schema::dropIfExists('city_model');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('continents');
        Schema::dropIfExists('timezones');
    }
}
