<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\CarType;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('rental_company')->nullable();
            $table->longText('rental_information')->nullable();
            $table->integer('no_of_passenger')->nullable()->default(1);
            $table->integer('no_of_baggage')->nullable()->default(1);
            $table->foreignIdFor(CarType::class)->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedDecimal('price', $precision = 19, $scale = 2)->default(0.01); 
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
        Schema::dropIfExists('cars');
    }
};
