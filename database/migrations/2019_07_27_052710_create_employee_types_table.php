<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_type');
            $table->timestamps();
        });

        DB::table('employee_types')->insert(
            array(
                'employee_type' => 'Full Time',
                
            )

        );

        DB::table('employee_types')->insert(
            array(
                'employee_type' => 'Part Time',
                
            )

        );

        DB::table('employee_types')->insert(
            array(
                'employee_type' => 'Intern',
                
            )

        );

        DB::table('employee_types')->insert(
            array(
                'employee_type' => 'Contractor',
                
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
        Schema::dropIfExists('employee_types');
    }
}
