<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        Schema::create('activity_feeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('moderator_id');
            $table->string('type')->nullable();
            $table->decimal('price_old', 10, 2)->default(0);
            $table->decimal('price_new', 10, 2)->default(0);
            $table->timestamps();
            $table->foreign('moderator_id')->references('id')->on('moderators')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('activity_feeds');
    }
    
};
