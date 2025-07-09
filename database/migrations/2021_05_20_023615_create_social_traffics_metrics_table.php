<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialTrafficsMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_traffics_metrics', function (Blueprint $table) {
            $table->id();
            $table->string('social_network');
            $table->string('user');
            $table->string('new_user');
            $table->string('sessions');
            $table->string('bounce_rate');
            $table->string('pages');
            $table->string('session_duration');
            $table->string('status');
            $table->timestamps();
        });

        // Insert some social traffics metrics 
        DB::table('social_traffics_metrics')->insert(
            array(
            [
                'social_network' => 'Facebook',
                'user' => '1,458',
                'new_user' =>'452',
                'sessions' => '9,245',
                'bounce_rate' => '35',
                'pages' => '5.9',
                'session_duration' => '00:08:16',
                'status' => 'today'
            ],
            [
                'social_network' => 'Twitter',
                'user' => '4,785',
                'new_user' =>'426',
                'sessions' => '8,156',
                'bounce_rate' => '-26',
                'pages' => '1.5',
                'session_duration' => '00:05:16',
                'status' => 'today'
            ],
            [
                'social_network' => 'Linkedin',
                'user' => '3,416',
                'new_user' =>'951',
                'sessions' => '6,124',
                'bounce_rate' => '56',
                'pages' => '5.3',
                'session_duration' => '00:05:16',
                'status' => 'today'
            ],
            [
                'social_network' => 'Youtube',
                'user' => '5,426',
                'new_user' =>'753',
                'sessions' => '9,147',
                'bounce_rate' => '15',
                'pages' => '7.5',
                'session_duration' => '00:05:16',
                'status' => 'today'
            ],
            [
                'social_network' => 'Instagram',
                'user' => '6,258',
                'new_user' =>'852',
                'sessions' => '4,369',
                'bounce_rate' => '75',
                'pages' => '2.7',
                'session_duration' => '00:05:16',
                'status' => 'today'
            ],
            [
                'social_network' => 'Google+',
                'user' => '9,632',
                'new_user' =>'123',
                'sessions' => '1,256',
                'bounce_rate' => '46',
                'pages' => '2.6',
                'session_duration' => '00:05:16',
                'status' => 'today'
            ],
            [
                'social_network' => 'Facebook',
                'user' => '2,458',
                'new_user' =>'552',
                'sessions' => '10,245',
                'bounce_rate' => '38',
                'pages' => '6.9',
                'session_duration' => '00:08:16',
                'status' => 'week'
            ],
            [
                'social_network' => 'Twitter',
                'user' => '5,785',
                'new_user' =>'526',
                'sessions' => '6,156',
                'bounce_rate' => '-36',
                'pages' => '2.5',
                'session_duration' => '00:05:16',
                'status' => 'week'
            ],
            [
                'social_network' => 'Linkedin',
                'user' => '34,416',
                'new_user' =>'151',
                'sessions' => '6,124',
                'bounce_rate' => '36',
                'pages' => '6.3',
                'session_duration' => '00:05:16',
                'status' => 'week'
            ],
            [
                'social_network' => 'Youtube',
                'user' => '6,426',
                'new_user' =>'553',
                'sessions' => '10,147',
                'bounce_rate' => '55',
                'pages' => '6.5',
                'session_duration' => '00:05:16',
                'status' => 'week'
            ],
            [
                'social_network' => 'Instagram',
                'user' => '60,258',
                'new_user' =>'5552',
                'sessions' => '2,369',
                'bounce_rate' => '95',
                'pages' => '6.7',
                'session_duration' => '00:05:16',
                'status' => 'week'
            ],
            [
                'social_network' => 'Google+',
                'user' => '2,632',
                'new_user' =>'223',
                'sessions' => '3,256',
                'bounce_rate' => '26',
                'pages' => '5.6',
                'session_duration' => '00:05:16',
                'status' => 'week'
            ],
            [
                'social_network' => 'Facebook',
                'user' => '26,458',
                'new_user' =>'5052',
                'sessions' => '15,245',
                'bounce_rate' => '58',
                'pages' => '3.9',
                'session_duration' => '00:08:16',
                'status' => 'month'
            ],
            [
                'social_network' => 'Twitter',
                'user' => '52,785',
                'new_user' =>'6026',
                'sessions' => '60,156',
                'bounce_rate' => '-66',
                'pages' => '6.5',
                'session_duration' => '00:05:16',
                'status' => 'month'
            ],
            [
                'social_network' => 'Linkedin',
                'user' => '34,416',
                'new_user' =>'151',
                'sessions' => '6,124',
                'bounce_rate' => '36',
                'pages' => '6.3',
                'session_duration' => '00:05:16',
                'status' => 'month'
            ],
            [
                'social_network' => 'Youtube',
                'user' => '60,426',
                'new_user' =>'553',
                'sessions' => '10,147',
                'bounce_rate' => '55',
                'pages' => '8.5',
                'session_duration' => '00:05:16',
                'status' => 'month'
            ],
            [
                'social_network' => 'Instagram',
                'user' => '60,258',
                'new_user' =>'5552',
                'sessions' => '2,369',
                'bounce_rate' => '95',
                'pages' => '6.7',
                'session_duration' => '00:05:16',
                'status' => 'month'
            ],
            [
                'social_network' => 'Google+',
                'user' => '20,632',
                'new_user' =>'223',
                'sessions' => '30,256',
                'bounce_rate' => '26',
                'pages' => '6.6',
                'session_duration' => '00:05:16',
                'status' => 'month'
            ],
            [
                'social_network' => 'Facebook',
                'user' => '1,458',
                'new_user' =>'452',
                'sessions' => '9,245',
                'bounce_rate' => '35',
                'pages' => '5.9',
                'session_duration' => '00:08:16',
                'status' => 'year'
            ],
            [
                'social_network' => 'Twitter',
                'user' => '4,285',
                'new_user' =>'424',
                'sessions' => '8,356',
                'bounce_rate' => '-25',
                'pages' => '1.5',
                'session_duration' => '00:05:16',
                'status' => 'year'
            ],
            [
                'social_network' => 'Linkedin',
                'user' => '3,416',
                'new_user' =>'951',
                'sessions' => '6,124',
                'bounce_rate' => '56',
                'pages' => '5.3',
                'session_duration' => '00:05:16',
                'status' => 'year'
            ],
            [
                'social_network' => 'Youtube',
                'user' => '5,426',
                'new_user' =>'753',
                'sessions' => '9,147',
                'bounce_rate' => '15',
                'pages' => '7.5',
                'session_duration' => '00:05:16',
                'status' => 'year'
            ],
            [
                'social_network' => 'Instagram',
                'user' => '6,258',
                'new_user' =>'852',
                'sessions' => '4,369',
                'bounce_rate' => '75',
                'pages' => '2.7',
                'session_duration' => '00:05:16',
                'status' => 'year'
            ],
            [
                'social_network' => 'Google+',
                'user' => '9,632',
                'new_user' =>'123',
                'sessions' => '1,256',
                'bounce_rate' => '46',
                'pages' => '2.6',
                'session_duration' => '00:05:16',
                'status' => 'year'
            ]
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
        Schema::dropIfExists('social_traffics_metrics');
    }
}