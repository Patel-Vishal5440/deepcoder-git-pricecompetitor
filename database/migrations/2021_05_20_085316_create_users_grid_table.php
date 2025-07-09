<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersGridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_grid', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->text('image');
            $table->string('total_revenue');
            $table->string('orders');
            $table->string('products');
            $table->timestamps();
        });
        // Insert some users grid  
        DB::table('users_grid')->insert(
            array(
            [
                'name' => 'Garry Sobars',
                'position' => 'Founder & CEO',
                'image' =>'img/tm1.png',
                'total_revenue' => '72,572',
                'orders' => '3,257',
                'products' => '74'
            ],
            [
                'name' => 'Barbara Marion',
                'position' => 'Tech Executive',
                'image' =>'img/tm2.png',
                'total_revenue' => '70,572',
                'orders' => '2,257',
                'products' => '94'
            ],
            [
                'name' => 'Christine Arnold',
                'position' => 'Lead Designer',
                'image' =>'img/tm3.png',
                'total_revenue' => '70,572',
                'orders' => '4,257',
                'products' => '44'
            ],
            [
                'name' => 'Natalie Corwin',
                'position' => 'Product Designer',
                'image' =>'img/tm4.png',
                'total_revenue' => '77,572',
                'orders' => '6,257',
                'products' => '55'
            ],
            [
                'name' => 'Carolyn Park',
                'position' => 'Lead Designer',
                'image' =>'img/tm5.png',
                'total_revenue' => '88,572',
                'orders' => '8,257',
                'products' => '91'
            ],
            [
                'name' => 'Garry Sobars',
                'position' => 'Founder & CEO',
                'image' =>'img/tm1.png',
                'total_revenue' => '79,572',
                'orders' => '30,257',
                'products' => '64'
            ],
            [
                'name' => 'Barbara Marion',
                'position' => 'Tech Executive',
                'image' =>'img/tm2.png',
                'total_revenue' => '72,572',
                'orders' => '3,257',
                'products' => '74'
            ],
            [
                'name' => 'Christine Arnold',
                'position' => 'Lead Designer',
                'image' =>'img/tm3.png',
                'total_revenue' => '79,572',
                'orders' => '6,257',
                'products' => '34'
            ],
            [
                'name' => 'Natalie Corwin',
                'position' => 'Product Designer',
                'image' =>'img/tm4.png',
                'total_revenue' => '73,572',
                'orders' => '1,257',
                'products' => '76'
            ],
            [
                'name' => 'Carolyn Park',
                'position' => 'Lead Designer',
                'image' =>'img/tm5.png',
                'total_revenue' => '74,572',
                'orders' => '1,257',
                'products' => '72'
            ],
            [
                'name' => 'Garry Sobars',
                'position' => 'Founder & CEO',
                'image' =>'img/tm1.png',
                'total_revenue' => '44,572',
                'orders' => '2,257',
                'products' => '25'
            ],
            [
                'name' => 'Barbara Marion',
                'position' => 'Tech Executive',
                'image' =>'img/tm2.png',
                'total_revenue' => '22,572',
                'orders' => '12,257',
                'products' => '99'
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
        Schema::dropIfExists('users_grid');
    }
}