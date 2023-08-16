<?php

use App\Models\Genre;
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
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('genre')->nullable();
            $table->string('eng')->nullable();
            $table->string('de')->nullable();
            $table->timestamps();
        });

        $genres = ['Arredamento', 'Videogiochi', 'Abbigliamento', 'Elettronica', 'Giardinaggio', 'Motori', 'Giochi', 'Musica', 'Sport', 'Libri'];
        $engs = ['Furnitures', 'Videogames', 'Clothing', 'Electronics', 'Gardening', 'Motors', 'Games', 'Musics', 'Sport', 'Books'];
        $des = ['Möbel', 'Videospiele', 'Kleidung', 'Elektronik', 'Gartenarbeit', 'Motoren', 'Spiele', 'Musik', 'Sport', 'Bücher'];


        for ($i = 0; $i < count($genres); $i++) {
            $genre = $genres[$i];
            $eng = $engs[$i];
            $de = $des[$i];
            Genre::create([
                'genre' => $genre,
                'eng' => $eng,
                'de' => $de,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genres');
    }
};
