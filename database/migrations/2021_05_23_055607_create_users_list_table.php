<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('users_list', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->text('image');
            $table->string('aboutus');
            $table->string('per_hour');
            $table->string('earned');
            $table->timestamps();
        });

        // Insert some users list  
        DB::table('users_list')->insert(
            array(
            [
                'name' => 'Garry Sobars',
                'position' => 'Founder & CEO',
                'image' =>'img/tm1.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Barbara Marion',
                'position' => 'Tech Executive',
                'image' =>'img/tm2.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Christine Arnold',
                'position' => 'Lead Designer',
                'image' =>'img/tm3.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Natalie Corwin',
                'position' => 'Product Designer',
                'image' =>'img/tm4.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Carolyn Park',
                'position' => 'Lead Designer',
                'image' =>'img/tm5.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Garry Sobars',
                'position' => 'Founder & CEO',
                'image' =>'img/tm1.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Barbara Marion',
                'position' => 'Tech Executive',
                'image' =>'img/tm2.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Christine Arnold',
                'position' => 'Lead Designer',
                'image' =>'img/tm3.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Natalie Corwin',
                'position' => 'Product Designer',
                'image' =>'img/tm4.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Carolyn Park',
                'position' => 'Lead Designer',
                'image' =>'img/tm5.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Garry Sobars',
                'position' => 'Founder & CEO',
                'image' =>'img/tm1.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Barbara Marion',
                'position' => 'Tech Executive',
                'image' =>'img/tm2.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Garry Sobars',
                'position' => 'Founder & CEO',
                'image' =>'img/tm1.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Barbara Marion',
                'position' => 'Tech Executive',
                'image' =>'img/tm2.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Carolyn Park',
                'position' => 'Lead Designer',
                'image' =>'img/tm5.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Natalie Corwin',
                'position' => 'Product Designer',
                'image' =>'img/tm4.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Carolyn Park',
                'position' => 'Lead Designer',
                'image' =>'img/tm5.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Garry Sobars',
                'position' => 'Founder & CEO',
                'image' =>'img/tm1.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Garry Sobars',
                'position' => 'Founder & CEO',
                'image' =>'img/tm1.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Barbara Marion',
                'position' => 'Tech Executive',
                'image' =>'img/tm2.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Christine Arnold',
                'position' => 'Lead Designer',
                'image' =>'img/tm3.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Natalie Corwin',
                'position' => 'Product Designer',
                'image' =>'img/tm4.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Carolyn Park',
                'position' => 'Lead Designer',
                'image' =>'img/tm5.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Garry Sobars',
                'position' => 'Founder & CEO',
                'image' =>'img/tm1.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Barbara Marion',
                'position' => 'Tech Executive',
                'image' =>'img/tm2.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Christine Arnold',
                'position' => 'Lead Designer',
                'image' =>'img/tm3.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Natalie Corwin',
                'position' => 'Product Designer',
                'image' =>'img/tm4.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Carolyn Park',
                'position' => 'Lead Designer',
                'image' =>'img/tm5.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Garry Sobars',
                'position' => 'Founder & CEO',
                'image' =>'img/tm1.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Barbara Marion',
                'position' => 'Tech Executive',
                'image' =>'img/tm2.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Christine Arnold',
                'position' => 'Lead Designer',
                'image' =>'img/tm3.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Natalie Corwin',
                'position' => 'Product Designer',
                'image' =>'img/tm4.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Carolyn Park',
                'position' => 'Lead Designer',
                'image' =>'img/tm5.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Garry Sobars',
                'position' => 'Founder & CEO',
                'image' =>'img/tm1.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Barbara Marion',
                'position' => 'Tech Executive',
                'image' =>'img/tm2.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Garry Sobars',
                'position' => 'Founder & CEO',
                'image' =>'img/tm1.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Barbara Marion',
                'position' => 'Tech Executive',
                'image' =>'img/tm2.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
            ],
            [
                'name' => 'Carolyn Park',
                'position' => 'Lead Designer',
                'image' =>'img/tm5.png',
                'aboutus' => 'Lorem ipsum dolor amet, consetetur sadipscing elitr sed diam nonumy eirmod.',
                'per_hour'=>'25',
                'earned' =>'88'
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
        Schema::dropIfExists('users_list');
    }
}
