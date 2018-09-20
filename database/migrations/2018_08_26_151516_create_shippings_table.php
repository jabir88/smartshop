<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->increments('shipping_id');
            $table->string('shipping_fullname',50);
            $table->string('shipping_email',60);
            $table->string('shipping_phone',30);
            $table->text('shipping_address');
            $table->string('shipping_city',30);
            $table->string('shipping_country',30);
            $table->timestamps();
              $table->softDeletes();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippings');
    }
}
