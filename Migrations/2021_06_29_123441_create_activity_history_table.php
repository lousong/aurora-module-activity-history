<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class CreateActivityHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Capsule::schema()->create('activity_history', function (Blueprint $table) {
            $table->id('Id');
            $table->integer('UserId')->default(0);
            $table->string('ResourceType')->default('');
            $table->string('ResourceId')->default('');
            $table->string('IpAddress')->default();
            $table->string('Action')->default('');
            $table->integer('Timestamp')->default(0);
            $table->string('GuestPublicId')->default('');

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
        Capsule::schema()->dropIfExists('activity_history');
    }
}
