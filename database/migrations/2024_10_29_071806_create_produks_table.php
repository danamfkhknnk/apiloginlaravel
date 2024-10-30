<?php

use App\Models\produk;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->string('desc');
            $table->timestamps();
        });

        $faker = \Faker\Factory::create();
        for($i=0;$i<10;$i++){
            produk::create([
                'name'=> $faker->word,
                'price'=> $faker->randomNumber(3, true),
                'desc'=>$faker->sentence(5, true)
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};