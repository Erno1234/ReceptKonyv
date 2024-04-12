<?php

use App\Models\Kategoriak;
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
        Schema::create('kategoriaks', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->timestamps();
        });


        Kategoriak::create(["nev" => "főétel"]);
        Kategoriak::create(["nev" => "leves"]);
        Kategoriak::create(["nev" => "édesség"]);
        Kategoriak::create(["nev" => "saláta"]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoriaks');
    }
};
