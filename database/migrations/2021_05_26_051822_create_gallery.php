<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGallery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('image');
            $table->text('category');
            $table->timestamps();
        });
        // Insert some gallery List  
        DB::table('gallery')->insert(
            array(
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery.png",
                    "category"=>1
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery2.png",
                    "category"=>1
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery3.png",
                    "category"=>1
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery4.png",
                    "category"=>1
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery5.png",
                    "category"=>1
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery6.png",
                    "category"=>1
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery7.png",
                    "category"=>1
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery8.png",
                    "category"=>1
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery9.png",
                    "category"=>1
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery10.png",
                    "category"=>1
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery11.png",
                    "category"=>1
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery4.png",
                    "category"=>2
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery5.png",
                    "category"=>2
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery6.png",
                    "category"=>2
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery7.png",
                    "category"=>2
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery.png",
                    "category"=>3
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery2.png",
                    "category"=>3
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery3.png",
                    "category"=>3
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery.png",
                    "category"=>4
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery2.png",
                    "category"=>4
                ],
                [
                    "title"=>"Snow covered mountain",
                    "image"=>"img/gallery3.png",
                    "category"=>4
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
        Schema::dropIfExists('gallery');
    }
}
