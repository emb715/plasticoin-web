<?php

namespace App\Nova\Panels;

use App\Models;
use App\Nova\City;
use App\Nova\Country;
use App\Nova\Province;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

trait HasAddressPanel
{
    /**
     * Retrieve the address panel.
     */
    protected function addressPanel(array $fields = [], bool $addresField = true): Panel
    {
        return (new Panel('Dirección', array_merge([

            BelongsTo::make(Country::singularLabel(), 'country', Country::class)
                ->onlyOnDetail(),

            BelongsTo::make(Province::singularLabel(), 'province', Province::class)
                ->onlyOnDetail(),

            BelongsTo::make(City::singularLabel(), 'city', City::class)
                ->exceptOnForms(),

            Select::make(Country::singularLabel(), 'country_id')
                ->options($this->countries())
                ->displayUsingLabels()
                ->rules('required', 'integer', 'exists:countries,id')
                ->onlyOnForms(),

            Select::make(Province::singularLabel(), 'province_id')
                ->options($this->provinces())
                ->displayUsingLabels()
                ->rules('required', 'integer', 'exists:provinces,id')
                ->dependsOn('country_id', function (Select $field, NovaRequest $request) {
                    $field->options($this->provinces($request->country_id));
                })
                ->onlyOnForms(),

            Select::make(City::singularLabel(), 'city_id')
                ->options($this->cities())
                ->displayUsingLabels()
                ->rules('required', 'integer', 'exists:cities,id')
                ->dependsOn('province_id', function (Select $field, NovaRequest $request) {
                    $field->options($this->cities($request->province_id));
                })
                ->onlyOnForms(),

        ], $addresField ? [$this->addressField()] : [], $fields)))->withToolbar();
    }

    /**
     * Get the address field.
     */
    protected function addressField(): Text
    {
        return Text::make('Dirección', 'address')
            ->rules('required', 'string', 'max:255')
            ->hideFromIndex();
    }

    /**
     * Retrieve the countries.
     */
    private function countries(): Collection
    {
        return Cache::remember(
            'nova-countries',
            60 * 60 * 6,
            fn () => Models\Country::query()->pluck('name', 'id')
        );
    }

    /**
     * Retrieve the provinces.
     */
    private function provinces(?int $countryId = null): Collection
    {
        return Cache::remember(
            'nova-provinces:country-id:' . $countryId,
            60 * 60 * 6,
            fn () => Cache::remember(
                'nova-provinces',
                60 * 60 * 6,
                fn () => Models\Province::get()
            )
                ->unless(
                    is_null($countryId),
                    fn (Collection $collection) => $collection->where('country_id', $countryId)
                )->mapWithKeys(fn (Models\Province $item) => [
                    $item['id'] => [
                        'label' => $item['name'],
                        'group' => $this->countries()->get($item['country_id']),
                    ],
                ])
        );
    }

    /**
     * Retrieve the cities.
     */
    private function cities(?int $provinceId = null): Collection
    {
        return Cache::remember(
            'nova-cities:province-id:' . $provinceId,
            60 * 60 * 6,
            fn () => Cache::remember(
                'nova-cities',
                60 * 60 * 6,
                fn () => Models\City::get()
            )
                ->unless(
                    is_null($provinceId),
                    fn (Collection $collection) => $collection->where('province_id', $provinceId)
                )->mapWithKeys(fn (Models\City $item) => [
                    $item['id'] => [
                        'label' => $item['name'],
                        'group' => $this->provinces()->get($item['province_id'])['label'],
                    ],
                ])
        );
    }
}
