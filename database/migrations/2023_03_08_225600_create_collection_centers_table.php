<?php

use App\Models\City;
use App\Models\CollectionCenter;
use App\Models\Country;
use App\Models\Province;
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
        Schema::create('collection_centers', function (Blueprint $table) {
            $table->id();
            $table->boolean('enabled')->default(false);
            $table->string('name');
            $table->string('image');
            $table->text('description')->nullable();
            $table->foreignIdFor(Country::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Province::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(City::class)->nullable()->constrained()->nullOnDelete();
            $table->string('address');
            $table->string('url');
            $table->string('open_days')->nullable();
            $table->string('open_times');
            $table->unsignedBigInteger('order');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('collection_center_user', function (Blueprint $table) {
            $table->foreignIdFor(CollectionCenter::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();

            $table->index(['user_id', 'collection_center_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_center_user');
        Schema::dropIfExists('collection_centers');
    }
};
