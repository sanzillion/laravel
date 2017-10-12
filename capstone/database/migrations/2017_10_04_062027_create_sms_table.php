<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sender');
            $table->string('recipient');
            $table->text('body');
            $table->string('code');
            $table->timestamps();
        });

        Schema::create('ship', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sender');
            $table->text('recipient');
            $table->text('body');
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
        Schema::dropIfExists('sms');
        Schema::dropIfExists('ship');
    }
}
