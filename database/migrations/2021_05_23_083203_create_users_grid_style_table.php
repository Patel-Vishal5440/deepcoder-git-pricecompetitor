<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersGridStyleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_grid_style', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->text('cover_photo');
            $table->text('image');
            $table->timestamps();
        });
         // Insert some users grid style list  
         DB::table('users_grid_style')->insert(
            array(
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover2.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover2.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover5.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover6.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover2.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover2.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover5.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover6.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover2.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover2.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover5.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover6.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover2.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover.png',
                'image' =>'img/author/profile.png'
            ],
            [
                'name' => 'Duran Clayton',
                'position' => 'UI/UX Designer',
                'cover_photo' =>'img/Cover2.png',
                'image' =>'img/author/profile.png'
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
        Schema::dropIfExists('users_grid_style');
    }
}
