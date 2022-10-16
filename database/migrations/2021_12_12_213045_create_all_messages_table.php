<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("conversation_id");
            $table->longText("msg")->nullable();
            $table->integer("hasFile")->default(0)->comment("0 = false, 1 = true");
            $table->string("file")->nullable();
            $table->string("fileType")->nullable();
            $table->integer("sent_by");
            $table->string("seen")->default("unseen");
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
        Schema::dropIfExists('all_messages');
    }
}
