<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('
            ALTER TABLE properties
            ADD CONSTRAINT properties_price_non_negative_check
            CHECK (price >= 0)
        ');
        DB::statement('
            ALTER TABLE properties
            ADD CONSTRAINT properties_capacity_strict_positive_check
            CHECK (capacity > 0)
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('
            ALTER TABLE properties
            DROP CHECK properties_price_non_negative_check
        ');
        DB::statement('
            ALTER TABLE properties
            DROP CHECK properties_capacity_strict_positive_check
        ');
    }
};
