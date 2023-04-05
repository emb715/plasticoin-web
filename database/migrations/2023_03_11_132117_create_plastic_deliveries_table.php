<?php

use App\Models\CollectionCenter;
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
        Schema::create('plastic_deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(CollectionCenter::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->unsignedDouble('home_plastic_amount', 10, 4)->default(0);
            $table->unsignedDouble('beach_plastic_amount', 10, 4)->default(0);
            $table->unsignedDouble('micro_plastic_amount', 10, 4)->default(0);
            $table->unsignedDouble('plastic_amount')->virtualAs('home_plastic_amount + beach_plastic_amount + micro_plastic_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plastic_deliveries');
    }
};
