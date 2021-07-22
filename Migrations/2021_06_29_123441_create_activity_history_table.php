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

                $table->timestamp(\Aurora\System\Classes\Model::CREATED_AT)->nullable();
                $table->timestamp(\Aurora\System\Classes\Model::UPDATED_AT)->nullable();
            });
        } else if (Capsule::schema()->hasColumn('activity_history', 'user_id')) {
            Capsule::schema()->table('activity_history', function (Blueprint $table) {
                $table->renameColumn('id', 'Id');
                $table->renameColumn('user_id', 'UserId');
                $table->renameColumn('resource_type', 'ResourceType');
                $table->renameColumn('resource_id', 'ResourceId');
                $table->renameColumn('ip_address', 'IpAddress');
                $table->renameColumn('action', 'Action');
                $table->renameColumn('time', 'Timestamp');
                $table->renameColumn('guest_public_id', 'GuestPublicId'); 
                $table->timestamp(\Aurora\System\Classes\Model::CREATED_AT)->nullable();
                $table->timestamp(\Aurora\System\Classes\Model::UPDATED_AT)->nullable();
            });
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
