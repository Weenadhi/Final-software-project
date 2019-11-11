<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BankBranchs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_branchs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('branch_name');
            $table->timestamps();
        });

        DB::table('bank_branchs')->insert(
            array(
                'branch_name' => 'Matara',
                
            )
        );

        DB::table('bank_branchs')->insert(
            array(
                'branch_name' => 'Galle',
                
            )
        );

        DB::table('bank_branchs')->insert(
            array(
                'branch_name' => 'Colombo',
                
            )
        );

        DB::table('bank_branchs')->insert(
            array(
                'branch_name' => 'Kandy',
                
            )
        );

        DB::table('bank_branchs')->insert(
            array(
                'branch_name' => 'Other',
                
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
        Schema::dropIfExists('bank_branchs');
    }
}
