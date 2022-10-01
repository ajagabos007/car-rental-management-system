<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Amenity;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenitables', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Amenity::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('amenitable_id');
            $table->string('amenitable_type');
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
        Schema::dropIfExists('amenitables');
    }
};
