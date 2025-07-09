<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwitterOverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twitter_overviews', function (Blueprint $table) {
            $table->id();
            $table->string('tweets');
            $table->string('impressions');
            $table->string('retweets');
            $table->string('engagement_rate');
            $table->string('new_followers');
            $table->string('status');
            $table->timestamps();
        });

        // Insert some twitter overviews 
        DB::table('twitter_overviews')->insert(
            array(
            [
                'tweets' => '472',
                'impressions' => '2K',
                'retweets' =>'78',
                'engagement_rate' => '4.8',
                'new_followers' => '178',
                'status' => 'week'
            ],
            [
                'tweets' => '2472',
                'impressions' => '8K',
                'retweets' =>'278',
                'engagement_rate' => '3.8',
                'new_followers' => '778',
                'status' => 'month'
            ],
            [
                'tweets' => '2472',
                'impressions' => '78K',
                'retweets' =>'2078',
                'engagement_rate' => '4.8',
                'new_followers' => '5778',
                'status' => 'year'
            ],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('twitter_overviews');
    }
}