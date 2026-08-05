<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->decimal('price',10,2);
            $table->integer('capacity');
            $table->foreignIdFor(User::class,'owner_id')->constrained()->cascadeOnDelete();
            $table->boolean('validated')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    	Schema::table('properties', function(Blueprint $table){
    		$table->dropForeign(['owner']);
    	});
        Schema::dropIfExists('properties');
    }
};
