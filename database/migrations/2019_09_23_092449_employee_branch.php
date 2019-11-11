<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeBranch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_branch', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_branch');
            $table->timestamps();
        });

        DB::table('employee_branch')->insert(
            array(
                'company_branch' => 'Matara',
                
            )
        );

        DB::table('employee_branch')->insert(
            array(
                'company_branch' => 'Colombo',
                
            )
        );

        DB::table('employee_branch')->insert(
            array(
                'company_branch' => 'Galle',
                
            )
        );

        DB::table('employee_branch')->insert(
            array(
                'company_branch' => 'Kandy',
                
            )
        );

        DB::table('employee_branch')->insert(
            array(
                'company_branch' => 'Other',
                
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
        Schema::dropIfExists('employee_branch');
    }
}
