<?php

use App\Models\Benefit;
use App\Models\CollectionCenter;
use App\Models\Company;
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
        Schema::create('benefits', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class)->nullable()->constrained()->nullOnDelete();
            $table->boolean('enabled')->default(false);
            $table->string('name');
            $table->unsignedInteger('value');
            $table->string('promotion')->nullable();
            $table->boolean('product')->default(false);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('order');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('benefit_collection_center', function (Blueprint $table) {
            $table->foreignIdFor(Benefit::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(CollectionCenter::class)->constrained()->cascadeOnDelete();

            $table->index(['benefit_id', 'collection_center_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefit_collection_center');
        Schema::dropIfExists('benefits');
    }
};
