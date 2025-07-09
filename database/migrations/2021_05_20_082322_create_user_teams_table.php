<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->text('image');
            $table->timestamps();
        });

         // Insert some user teams 
         DB::table('user_teams')->insert(
            array(
            [
                'name' => 'Garry Sobars',
                'position' => 'Founder & CEO',
                'image' =>'img/tm1.png',
            ],
            [
                'name' => 'Barbara Marion',
                'position' => 'Tech Executive',
                'image' =>'img/tm2.png',
            ],
            [
                'name' => 'Christine Arnold',
                'position' => 'Lead Designer',
                'image' =>'img/tm3.png',
            ],
            [
                'name' => 'Natalie Corwin',
                'position' => 'Product Designer',
                'image' =>'img/tm4.png',
            ],
            [
                'name' => 'Carolyn Park',
                'position' => 'Lead Designer',
                'image' =>'img/tm5.png',
            ],
            [
                'name' => 'Garry Sobars',
                'position' => 'Founder & CEO',
                'image' =>'img/tm1.png',
            ],
            [
                'name' => 'Barbara Marion',
                'position' => 'Tech Executive',
                'image' =>'img/tm2.png',
            ],
            [
                'name' => 'Christine Arnold',
                'position' => 'Lead Designer',
                'image' =>'img/tm3.png',
            ],
            [
                'name' => 'Natalie Corwin',
                'position' => 'Product Designer',
                'image' =>'img/tm4.png',
            ],
            [
                'name' => 'Carolyn Park',
                'position' => 'Lead Designer',
                'image' =>'img/tm5.png',
            ],
            [
                'name' => 'Garry Sobars',
                'position' => 'Founder & CEO',
                'image' =>'img/tm1.png',
            ],
            [
                'name' => 'Barbara Marion',
                'position' => 'Tech Executive',
                'image' =>'img/tm2.png',
            ],
            [
                'name' => 'Christine Arnold',
                'position' => 'Lead Designer',
                'image' =>'img/tm3.png',
            ],
            [
                'name' => 'Natalie Corwin',
                'position' => 'Product Designer',
                'image' =>'img/tm4.png',
            ],
            [
                'name' => 'Carolyn Park',
                'position' => 'Lead Designer',
                'image' =>'img/tm5.png',
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
        Schema::dropIfExists('user_teams');
    }
}