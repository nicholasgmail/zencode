<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentgables', function (Blueprint $table) {
            $table->integer('commentators_id')->unsigned();
            $table->nullableMorphs('commentgable');
            $table->string('geolocation_ip')->nullable();
            $table->json('all_comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentgables');
    }
};
