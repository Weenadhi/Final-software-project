<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Banks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bank_name');
            $table->timestamps();
        });

        DB::table('banks')->insert(
            array(
                'bank_name' => 'BOC',
                
            )
        );

        DB::table('banks')->insert(
            array(
                'bank_name' => 'Commercial bank',
                
            )
        );

        DB::table('banks')->insert(
            array(
                'bank_name' => 'Sampath bank',
                
            )
        );

        DB::table('banks')->insert(
            array(
                'bank_name' => 'HNB',
                
            )
        );

        DB::table('banks')->insert(
            array(
                'bank_name' => 'People\'s bank',
                
            )
        );

        DB::table('banks')->insert(
            array(
                'bank_name' => 'other',
                
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
        Schema::dropIfExists('banks');
    }
}
