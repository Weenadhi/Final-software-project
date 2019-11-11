<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OtData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('is_ot_allow');
            $table->timestamps();
        });

        DB::table('ot_data')->insert(
            array(
                'is_ot_allow' => 'Yes',
                
            )
        );

        DB::table('ot_data')->insert(
            array(
                'is_ot_allow' => 'No',
                
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ot_data');
    }
}
