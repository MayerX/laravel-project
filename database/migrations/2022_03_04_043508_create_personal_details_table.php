<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_details', function (Blueprint $table) {
            $table->bigInteger('userId')->primary();
            $table->string('name', 60);
            $table->char('sex', 1);
            $table->integer('age');
            $table->string('minzu', 30)->comment('民族');
            $table->string('hunyin', 30)->comment('婚姻');
            $table->string('jiguan', 60)->comment('籍贯');
            $table->string('wenhuachengdu', 30)->comment('文化程度');
            $table->string('zhiye', 30)->comment('职业');
            $table->string('gongzuodanwei', 30)->comment('工作单位');
            $table->date('dateOfBirth');
            $table->string('address', 120);
            $table->integer('Hospital')->comment('所属医院');
            $table->string('Department', 60);
            $table->integer('community')->comment('社区');
            $table->string('email', 60);
            $table->string('mobilephone', 20);
            $table->string('housephone', 20);
            $table->string('photo', 100);
            $table->string('expert', 100);
            $table->string('dateJoined', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_details');
    }
}
