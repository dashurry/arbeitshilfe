<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("employer_id");
            $table->integer("freelancer_id");
            $table->integer("created_by")->comment("User ID");
            $table->string("type");
            $table->integer("project_id");
            $table->integer("blocked")->default(0)->comment("0 = false, 1 = true");
            $table->string("status")->default("open");
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
        Schema::dropIfExists('conversations');
    }
}
