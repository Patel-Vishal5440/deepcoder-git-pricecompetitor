<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYoutubeSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('youtube_subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('subscribers');
            $table->json('dataG');
            $table->json('dataL');
            $table->json('labels');
            $table->string('status');
            $table->timestamps();
        });
        // Insert some youtube_subscribers data  
        DB::table('youtube_subscribers')->insert(
            array(
                [
                    "subscribers"=>"25,472",
                    "dataG"=>json_encode([10, 50, 15, 70, 14, 24, 20]),
                    "dataL"=>json_encode([70, 35, 10, 25, 10, 14, 15]),
                    "labels"=>json_encode(["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"]),
                    "status" => "week"
                ],
                [
                    "subscribers"=>"75,582",
                    "dataG"=>json_encode([20, 30, 15, 60, 70, 24]),
                    "dataL"=>json_encode([70, 60, 40, 20, 15, 65]),
                    "labels"=>json_encode(["1-5", "6-10", "11-15", "15-20", "21-25", "25-30"]),
                    "status" => "month"
                ],
                [
                    "subscribers"=>"124,892",
                    "dataG"=>json_encode([20, 60, 50, 45, 50, 60, 70, 40, 45, 35, 25, 30]),
                    "dataL"=>json_encode([70, 60, 40, 20, 15, 65]),
                    "labels"=>json_encode([10, 40, 30, 40, 60, 55, 45, 35, 30, 20, 15, 20]),
                    "status" => "year"
                ])
            );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('youtube_subscribers');
    }
}
