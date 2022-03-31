<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedSmallInteger('judge_id');
            $table->unsignedSmallInteger('candidate_id');
            $table->unsignedMediumInteger('criteria_id');
            $table->double('rating');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table
                ->foreign('judge_id')
                ->references('id')
                ->on('judges')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table
                ->foreign('candidate_id')
                ->references('id')
                ->on('candidates')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table
                ->foreign('criteria_id')
                ->references('id')
                ->on('criteria')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
};
