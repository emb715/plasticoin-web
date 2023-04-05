<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait IsEnabled
{
    /**
     * Check if the model is enabled.
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * Check if the model is not enabled.
     */
    public function isNotEnabled(): bool
    {
        return ! $this->isEnabled();
    }

    /**
     * Scope the model for the enabled ones.
     */
    public function scopeEnabled(Builder $query, bool $enabled = true): Builder
    {
        return $query->where('enabled', $enabled);
    }
}
