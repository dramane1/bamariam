<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('classe')->nullable();
            $table->string('divers_salary_type')->nullable();
            $table->decimal('salary_amount')->nullable();
            $table ->bigInteger('expense_id')->nullable();
            $table ->bigInteger('user_id')->nullable();
            $table ->bigInteger('income_id')->nullable();
            $table->timestamp('salary_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salaries');
    }
}
