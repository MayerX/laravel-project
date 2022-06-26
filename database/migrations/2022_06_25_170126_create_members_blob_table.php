<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersBlobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_blob', function (Blueprint $table) {
            $table->bigInteger('userId')->index('userId');
            $table->bigInteger('size');
            $table->binary('file');
            $table->dateTime('time');
            $table->integer('MovementType');
            $table->dateTime('SamplingTime');
            $table->tinyInteger('score');
            $table->tinyInteger('EffectiveMotion');
            $table->integer('PredictType')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members_blob');
    }
}
