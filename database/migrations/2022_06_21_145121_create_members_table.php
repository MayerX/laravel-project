<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigInteger('userId')->primary();
            $table->bigInteger('memberId');
            $table->integer('memberType');
            $table->enum('limited', ['2', '3', '1']);
            $table->string('xianbingshi', 400);
            $table->string('jiwangshi', 400);
            $table->string('gerenshi', 120);
            $table->string('hunyushi', 120);
            $table->year('diagnosisYear');
            $table->string('guomingshi', 120);
            $table->string('jiazushi', 120);
            $table->string('doctors', 60);
            $table->string('kangfupingding', 400);
            $table->string('fuzhuzhenduan', 400);
            $table->string('linchuangzhenduan', 400);
            $table->string('kangfuzhenduan', 240);
            $table->string('kangfumubiao', 240);
            $table->string('kangfujihua', 240);
            $table->string('yundongchufang', 400);
            $table->string('VideoGuideIP', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
