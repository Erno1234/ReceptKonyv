<?php

use App\Models\Receptek;
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
        Schema::create('recepteks', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->foreignId('kat_id')->references('id')->on('kategoriaks');
            $table->string('kep_eleresi_ut')->nullable();
            $table->string('leiras')->nullable();
            $table->timestamps();
        });

        Receptek::create(["nev"=>"Húsleves","kat_id"=>2,"kep_eleresi_ut"=>"leveskep1","leiras"=>"Húsleves leírása"]);
        Receptek::create(["nev"=>"Sült oldalas","kat_id"=>1,"kep_eleresi_ut"=>"oldalaskep1","leiras"=>"Oldalas leírása"]);
        Receptek::create(["nev"=>"Töltöttkáposzta","kat_id"=>1,"kep_eleresi_ut"=>"toltottkaposzta","leiras"=>"Töltöttkáposzta leírása"]);
        Receptek::create(["nev"=>"Franciasaláta","kat_id"=>4,"kep_eleresi_ut"=>"salatakep2","leiras"=>"Franciasaláta leírása"]);
        Receptek::create(["nev"=>"Palacsinta","kat_id"=>3,"kep_eleresi_ut"=>"palacsinta","leiras"=>"Palacsinta leírása"]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recepteks');
    }
};
