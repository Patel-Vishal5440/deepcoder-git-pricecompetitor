<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_list', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('image');
            $table->string('location');
            $table->string('email');
            $table->string('company');
            $table->string('position');
            $table->string('phone');
            $table->boolean('star');
            $table->timestamps();
        });
         // Insert some Contact List  
         DB::table('contact_list')->insert(
            array(
                [
                    'user'=>'Kellie Marquot',
                    'image'=>'img/tm6.png',
                    'location'=>'San Francisco, CA',
                    'email'=>'marshall@yahoo.com',
                    'company'=>'Business Development',
                    'position'=>'Web Develope',
                    'phone'=>'+1 (861) 550-2796',
                    'star'=>0
                ],
                [
                    'user'=>'Kellie Marquot',
                    'image'=>'img/tm1.png',
                    'location'=>'San Francisco, CA',
                    'email'=>'marshall@yahoo.com',
                    'company'=>'Business Development',
                    'position'=>'Web Develope',
                    'phone'=>'+1 (861) 550-2796',
                    'star'=>1
                ],
                [
                    'user'=>'Kellie Marquot',
                    'image'=>'img/tm2.png',
                    'location'=>'San Francisco, CA',
                    'email'=>'marshall@yahoo.com',
                    'company'=>'Business Development',
                    'position'=>'Web Develope',
                    'phone'=>'+1 (861) 550-2796',
                    'star'=>0
                ],
                [
                    'user'=>'Kellie Marquot',
                    'image'=>'img/tm3.png',
                    'location'=>'San Francisco, CA',
                    'email'=>'marshall@yahoo.com',
                    'company'=>'Business Development',
                    'position'=>'Web Develope',
                    'phone'=>'+1 (861) 550-2796',
                    'star'=>1
                ],
                [
                    'user'=>'Kellie Marquot',
                    'image'=>'img/tm4.png',
                    'location'=>'San Francisco, CA',
                    'email'=>'marshall@yahoo.com',
                    'company'=>'Business Development',
                    'position'=>'Web Develope',
                    'phone'=>'+1 (861) 550-2796',
                    'star'=>0
                ],
                [
                    'user'=>'Kellie Marquot',
                    'image'=>'img/tm5.png',
                    'location'=>'San Francisco, CA',
                    'email'=>'marshall@yahoo.com',
                    'company'=>'Business Development',
                    'position'=>'Web Develope',
                    'phone'=>'+1 (861) 550-2796',
                    'star'=>1
                ],
                [
                    'user'=>'Kellie Marquot',
                    'image'=>'img/tm6.png',
                    'location'=>'San Francisco, CA',
                    'email'=>'marshall@yahoo.com',
                    'company'=>'Business Development',
                    'position'=>'Web Develope',
                    'phone'=>'+1 (861) 550-2796',
                    'star'=>0
                ],
                [
                    'user'=>'Kellie Marquot',
                    'image'=>'img/tm1.png',
                    'location'=>'San Francisco, CA',
                    'email'=>'marshall@yahoo.com',
                    'company'=>'Business Development',
                    'position'=>'Web Develope',
                    'phone'=>'+1 (861) 550-2796',
                    'star'=>0
                ],
                [
                    'user'=>'Kellie Marquot',
                    'image'=>'img/tm2.png',
                    'location'=>'San Francisco, CA',
                    'email'=>'marshall@yahoo.com',
                    'company'=>'Business Development',
                    'position'=>'Web Develope',
                    'phone'=>'+1 (861) 550-2796',
                    'star'=>0
                ],
                [
                    'user'=>'Kellie Marquot',
                    'image'=>'img/tm3.png',
                    'location'=>'San Francisco, CA',
                    'email'=>'marshall@yahoo.com',
                    'company'=>'Business Development',
                    'position'=>'Web Develope',
                    'phone'=>'+1 (861) 550-2796',
                    'star'=>1
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
        Schema::dropIfExists('contact_list');
    }
}
