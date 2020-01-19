<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsletterConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletter_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            // $table->unsignedInteger('newsletter_id');
            $table->string('banner');
            // $table->string('name');
            $table->text('emails');

            // $table->foreign('newsletter_id')
            //     ->references('id')->on('newsletters')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newsletter_configs');
    }
}
