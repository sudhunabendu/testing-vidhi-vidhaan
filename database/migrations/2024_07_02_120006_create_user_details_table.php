<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('images')->nullable();
            $table->date('dob')->nullable();
            $table->decimal('price',10,2)->nullable();
            $table->text('description')->nullable();
            $table->string('education')->nullable();
            $table->string('experience')->nullable();
            $table->bigInteger('country_id')->nullable();
            $table->bigInteger('state_id')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('user_details');
    }
};
