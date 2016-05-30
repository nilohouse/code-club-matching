<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteerPendingsTable extends Migration
{
    public function up()
    {
        Schema::create('volunteer_pendings', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->uuid('token');
            $table->primary('token');
            $table->integer('volunteer_id')->unsigned();
            $table->foreign('volunteer_id')->references('id')->on('volunteers');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('volunteer_pendings');
    }
}
