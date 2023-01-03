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
        // Create trigger that updates the avgRating column on every update of the ratings table
        DB::unprepared('
            CREATE TRIGGER update_cocktail_avg_rating
            AFTER UPDATE ON ratings
            FOR EACH ROW
            BEGIN
                UPDATE cocktails
                SET avgRating = (SELECT AVG(rating) FROM ratings WHERE cocktail_id = NEW.cocktail_id)
                WHERE id = NEW.cocktail_id;
            END
        ');

        DB::unprepared('
            CREATE TRIGGER insert_cocktail_avg_rating
            AFTER INSERT ON ratings
            FOR EACH ROW
            BEGIN
                UPDATE cocktails
                SET avgRating = (SELECT AVG(rating) FROM ratings WHERE cocktail_id = NEW.cocktail_id)
                WHERE id = NEW.cocktail_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `update_cocktail_avg_rating`');
        DB::unprepared('DROP TRIGGER `insert_cocktail_avg_rating`');
    }
};
