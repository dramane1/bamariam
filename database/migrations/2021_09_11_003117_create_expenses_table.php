<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('type_de_depense')->nullable();
            $table->string('autre_depense_type')->nullable();
            $table->string('event_type')->nullable();
            $table->string('description')->nullable();
            $table ->bigInteger('user_id')->nullable();
            $table->string('expense_amount')->nullable();
            $table ->bigInteger('salary_id')->nullable();
            $table ->bigInteger('income_id')->nullable();
            $table->timestamp('expense_at')->nullable();
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
        Schema::dropIfExists('expenses');
    }
}
