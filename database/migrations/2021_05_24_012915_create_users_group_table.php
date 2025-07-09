<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_group', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->text('body');
            $table->text('image');
            $table->string('current_project');
            $table->string('complete_status');
            $table->timestamps();
        });
         // Insert some users group   
         DB::table('users_group')->insert(
            array(
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl1.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl2.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl3.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl4.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl5.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl6.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl1.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl2.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl3.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl4.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl5.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl6.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl1.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl2.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl3.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl4.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl5.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl6.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl1.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl2.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl3.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl4.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl5.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl6.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl1.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl2.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl3.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl4.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl5.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl6.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl1.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl2.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl3.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl4.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl5.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl6.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl1.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl2.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl3.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl4.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl5.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
            ],
            [
                'title' => 'Dashboard UI',
                'location' => 'San Francisco, CA',
                'body' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod dolor ame.',
                'image' => 'img/ugl6.png',
                'current_project' =>'Plugin Development',
                'complete_status' => '45'
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
        Schema::dropIfExists('users_group');
    }
}
