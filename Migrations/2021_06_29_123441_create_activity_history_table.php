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
        if (!Capsule::schema()->hasTable('activity_history')) {
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
        } else if (Capsule::schema()->hasColumn('activity_history', 'user_id')) {
            Capsule::schema()->rename('id', 'Id');
            Capsule::schema()->rename('user_id', 'UserId');
            Capsule::schema()->rename('resource_type', 'ResourceType');
            Capsule::schema()->rename('resource_id', 'ResourceId');
            Capsule::schema()->rename('ip_address', 'IpAddress');
            Capsule::schema()->rename('action', 'Action');
            Capsule::schema()->rename('timestamp', 'Timestamp');
            Capsule::schema()->rename('guest_public_id', 'GuestPublicId');
        }
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
