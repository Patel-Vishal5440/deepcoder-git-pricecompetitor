<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateFacebookOverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_overviews', function (Blueprint $table) {
            $table->id();
            $table->string('engaged_users');
            $table->string('page_impressions');
            $table->string('total_page_likes');
            $table->string('new_page_likes');
            $table->json('chart_data_one');
            $table->json('chart_data_two');
            $table->json('chart_data_three');
            $table->json('chart_data_four');
            $table->string('status');
            $table->timestamps();
        });

         // Insert some facebook overviews 
         DB::table('facebook_overviews')->insert(
            array(
            [
                'engaged_users' => '25,845',
                'page_impressions' => '2,534',
                'total_page_likes' =>'2,142',
                'new_page_likes' => '1,132',
                'chart_data_one' => json_encode([150, 100, 200, 250, 200, 300, 150]),
                'chart_data_two' => json_encode([200, 150, 200, 250, 100, 200, 150]),
                'chart_data_three' => json_encode([150, 100, 200, 250, 200, 300, 150]),
                'chart_data_four' => json_encode([200, 150, 200, 250, 100, 200, 150]),
                'status' => 'today'
            ],
            [
                'engaged_users' => '26,845',
                'page_impressions' => '3,534',
                'total_page_likes' =>'3,142',
                'new_page_likes' => '2,132',
                'chart_data_one' => json_encode([1000, 5000, 1500, 10000, 14000, 24000, 20000]),
                'chart_data_two' => json_encode([10000, 15000, 10000, 15000, 14000, 24000, 20000]),
                'chart_data_three' => json_encode([100, 300, 150, 200, 250, 500, 300]),
                'chart_data_four' => json_encode([100, 300, 150, 200, 250, 500, 300]),
                'status' => 'week'
            ],
            [
                'engaged_users' => '28,845',
                'page_impressions' => '8,534',
                'total_page_likes' =>'9,142',
                'new_page_likes' => '5,132',
                'chart_data_one' => json_encode([15000, 50000, 15000, 15000, 40000, 24000, 20000]),
                'chart_data_two' => json_encode([20000, 40000, 16000, 15000, 30000, 23000, 25000]),
                'chart_data_three' => json_encode([5000, 4000, 16000, 10000, 20000, 13000, 10000, 6000]),
                'chart_data_four' => json_encode([1100, 2300, 1500, 1900, 500, 1400, 800, 500]),
                'status' => 'month'
            ],
            [
                'engaged_users' => '24,845',
                'page_impressions' => '5,534',
                'total_page_likes' =>'6,142',
                'new_page_likes' => '3,132',
                'chart_data_one' => json_encode([95000,19000,55000,90000,240000,95000,55000,19000,55000,66000,90000,240000]),
                'chart_data_two' => json_encode([98000,20000,55000,90000,240000,95000,55000,19000,55000,66000,90000,240000]),
                'chart_data_three' => json_encode([9500,1900,5500,9000,24000,9500,5500,1900,5500,9000,10000,24000]),
                'chart_data_four' => json_encode([5000,19000,15000,19000,20000,35000,20000,19000,27000,10000,15000,20000]),
                'status' => 'year'
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
        Schema::dropIfExists('facebook_overviews');
    }
}