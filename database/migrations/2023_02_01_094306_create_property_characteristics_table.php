<?php

use App\Enums\PropertyStatusEnum;
use App\Enums\PropertyTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_characteristics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->float('price')->required();
            $table->integer('bedrooms')->required();
            $table->integer('bathrooms')->required();
            $table->float('sqft')->required();
            $table->float('price_sqft')->required();
            $table->enum('property_type', [
                PropertyTypeEnum::SINGLE->value,
                PropertyTypeEnum::MULTIFAMILY->value,
                PropertyTypeEnum::TOWNHOUSE->value,
                PropertyTypeEnum::BUNGALOW->value
            ])->default(PropertyTypeEnum::SINGLE->value);
            $table->enum('status', [
                PropertyStatusEnum::SALE->value,
                PropertyStatusEnum::SOLD->value,
                PropertyStatusEnum::HOLD->value,
            ])->default(PropertyStatusEnum::SALE->value)->required();

            $table->timestamps();

            $table->foreign('property_id')
                ->references('id')
                ->on('properties')
                ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_characteristics');
    }
};
