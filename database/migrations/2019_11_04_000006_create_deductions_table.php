<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeductionsTable extends Migration
{
    public function up()
    {
        Schema::create('deductions', function (Blueprint $table) {
            $table->increments('id');

            $table->string('year')->nullable();

            $table->string('month');

            $table->string('deduction_type');

            $table->decimal('amount', 15, 2);

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
