<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactGrid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_grid', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->text('image');
            $table->string('designation');
            $table->string('mobile');
            $table->string('email');
            $table->string('address');
            $table->timestamps();
        });

        // Insert some Contact data  
        DB::table('contact_grid')->insert(
            array(
            [
                'user'=>'Grant Marshall',
                'image'=>'img/tm9.png',
                'designation'=>'User Interface Designer',
                'mobile'=>'+1 (861) 550-2796',
                'email'=>'marshall@yahoo.com',
                'address'=>'225 Bills Place'
            ],
            [
                'user'=>'Pena Valdez',
                'image'=>'img/tm10.png',
                'designation'=>'User Interface Designer',
                'mobile'=>'+1 (909) 445-2527',
                'email'=>'valdez@yahoo.com',
                'address'=>'266 Tiffany Place'
            ],
            [
                'user'=>'Jessica Miles',
                'image'=>'img/tm11.png',
                'designation'=>'Product Designer',
                'mobile'=>'+1 (824) 487-2755',
                'email'=>'miles@mail.com',
                'address'=>'240 Hillel Place'
            ],
            [
                'user'=>'Natasha Gamble',
                'image'=>'img/tm12.png',
                'designation'=>'PMotion Designer',
                'mobile'=>'+1 (824) 487-2755',
                'email'=>'gamble@outlook.com',
                'address'=>'463 Harbor Court'
            ],
            [
                'user'=>'Grant Marshall',
                'image'=>'img/tm9.png',
                'designation'=>'User Interface Designer',
                'mobile'=>'+1 (861) 550-2796',
                'email'=>'marshall@yahoo.com',
                'address'=>'225 Bills Place'
            ],
            [
                'user'=>'Pena Valdez',
                'image'=>'img/tm13.png',
                'designation'=>'User Interface Designer',
                'mobile'=>'+1 (909) 445-2527',
                'email'=>'valdez@yahoo.com',
                'address'=>'266 Tiffany Place'
            ],
            [
                'user'=>'Jessica Miles',
                'image'=>'img/tm14.png',
                'designation'=>'Product Designer',
                'mobile'=>'+1 (824) 487-2755',
                'email'=>'miles@mail.com',
                'address'=>'240 Hillel Place'
            ],
            [
                'user'=>'Natasha Gamble',
                'image'=>'img/tm6.png',
                'designation'=>'PMotion Designer',
                'mobile'=>'+1 (824) 487-2755',
                'email'=>'gamble@outlook.com',
                'address'=>'463 Harbor Court'
            ],
            [
                'user'=>'Natasha Gamble',
                'image'=>'img/tm5.png',
                'designation'=>'PMotion Designer',
                'mobile'=>'+1 (824) 487-2755',
                'email'=>'gamble@outlook.com',
                'address'=>'463 Harbor Court'
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
        Schema::dropIfExists('contact_grid');
    }
}
