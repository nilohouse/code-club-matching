<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsCoordinatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_coordinates', function(Blueprint $table) {
            $table->uuid('club_hash');
            $table->primary('club_hash');
            $table->string('name');
            $table->string('zipcode');
            $table->string('admin');
            $table->string('address');
            $table->double('lat', 10, 6);
            $table->double('lng', 10, 6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('club_coordinates');
    }
}
