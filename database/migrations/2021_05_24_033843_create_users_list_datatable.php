<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersListDatatable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_list_datatable', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('location');
            $table->text('image');
            $table->string('email');
            $table->string('company');
            $table->string('position');
            $table->string('join_date');
            $table->string('status');
            $table->timestamps();
        });

        // Insert some users list datatable   
        DB::table('users_list_datatable')->insert(
            array(
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Deactive'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Active'
            ],
            [
                'user' => 'Kellie Marquot',
                'location' => 'San Francisco, CA',
                'image' => 'img/tm6.png',
                'email' => 'John-Keller@Gmail.Com',
                'company' => 'Business Development',
                'position' => 'Web Developer',
                'join_date' =>'January 20, 2020',
                'status' => 'Blocked'
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
        Schema::dropIfExists('users_list_datatable');
    }
}
