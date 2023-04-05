<?php

use App\Models\User;
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
        Schema::create('plasticoins', function (Blueprint $table) {
            $table->id();
            $table->morphs('plasticoinable');
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->double('amount', 10, 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plasticoins');
    }
};
