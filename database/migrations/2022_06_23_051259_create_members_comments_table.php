<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_comments', function (Blueprint $table) {
            $table->bigInteger('userId');
            $table->bigInteger('memberId');
            $table->bigInteger('doctorId');
            $table->dateTime('time')->primary();
            $table->string('comment', 500)->index('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members_comments');
    }
}
