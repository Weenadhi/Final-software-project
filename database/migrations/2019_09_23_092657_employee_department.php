<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeDepartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_department', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('department');
            $table->timestamps();
        });

        DB::table('employee_department')->insert(
            array(
                'department' => 'Design',
                
            )
        );

        DB::table('employee_department')->insert(
            array(
                'department' => 'Develop',
                
            )

        );

        DB::table('employee_department')->insert(
            array(
                'department' => 'Testing',
                
            )

        );

        DB::table('employee_department')->insert(
            array(
                'department' => 'Financial',
                
            )

        );

        DB::table('employee_department')->insert(
            array(
                'department' => 'Operational',
                
            )

        );

        DB::table('employee_department')->insert(
            array(
                'department' => 'Research',
                
            )

        );

        DB::table('employee_department')->insert(
            array(
                'department' => 'other',
                
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
        Schema::dropIfExists('employee_department');
    }
}
