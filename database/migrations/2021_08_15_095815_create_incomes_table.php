<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->string('classe')->nullable();
            $table->decimal('income_amount')->nullable();
            $table ->bigInteger('expense_id')->nullable();
            $table ->bigInteger('user_id')->nullable();
            $table ->bigInteger('salary_id')->nullable();
            $table->timestamp('income_at')->nullable();
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
        Schema::dropIfExists('incomes');
    }
}
