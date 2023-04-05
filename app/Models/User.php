<?php

namespace App\Models;

use App\Models\Concerns\HasAddress;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Laravel\Nova\Auth\Impersonatable;

class User extends Authenticatable
{
    use HasAddress, Notifiable, SoftDeletes, Impersonatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'admin' => 'boolean',
    ];

    /**
     * Bootstrap the model and its traits.
     */
    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(
            'plasticoins',
            fn (Builder $query) => $query->withSum('plasticoins', 'amount')
        );
    }

    /**
     * Retrieve the user name with the plasticoins sum amount.
     */
    public function nameWithPlasticoins(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->name . ' (Plasticoins: ' . ($this->plasticoins_sum_amount ?? 0) . ')'
        );
    }

    /**
     * Retrieve the plasticoins sum amount attribute.
     */
    public function plasticoinsSumAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ?? 0
        );
    }

    /**
     * Get the collection center ids of the user.
     */
    public function collectionCenterIds(): Attribute
    {
        return Attribute::make(
            get: fn () => Cache::remember(
                'user-' . $this->id . '::collection-center-ids',
                now()->addHour(),
                fn () => $this->collectionCenters()->pluck('id')->toArray()
            )
        );
    }

    /**
     * Check if the user has sufficient plasticoins.
     */
    public function hasSufficientPlasticoins($amount = 0): bool
    {
        return $this->plasticoins_sum_amount >= $amount;
    }

    /**
     * Check if user is admin.
     */
    public function isAdmin(): bool
    {
        return $this->admin;
    }

    /**
     * Check if user is admin.
     */
    public function isNotAdmin(): bool
    {
        return ! $this->isAdmin();
    }

    /**
     * Check if user can access admin panel.
     */
    public function canAccessAdminPanel(): bool
    {
        return $this->isAdmin()
            || ! empty($this->collection_center_ids);
    }

    /**
     * Determine if the user can impersonate another user.
     */
    public function canImpersonate(): bool
    {
        return in_array($this->email, [
            'fkraefft@ivirtual.la',
        ]);
    }

    /**
     * Retrieve plasticoins of the user.
     */
    public function plasticoins(): HasMany
    {
        return $this->hasMany(Plasticoin::class);
    }

    /**
     * Retrieve the collection centers that the user has access.
     */
    public function collectionCenters(): BelongsToMany
    {
        return $this->belongsToMany(CollectionCenter::class);
    }

    /**
     * Retrieve the plastic deliveries of the user.
     */
    public function plasticDeliveries(): HasMany
    {
        return $this->hasMany(PlasticDelivery::class);
    }

    /**
     * Retrieve the transfers of the user.
     */
    public function transfers(): HasMany
    {
        return $this->hasMany(Transfer::class);
    }

    /**
     * Retrieve the vouchers of the user.
     */
    public function vouchers(): HasMany
    {
        return $this->hasMany(Voucher::class);
    }
}
