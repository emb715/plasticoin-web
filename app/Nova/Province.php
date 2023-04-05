<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Province extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Province>
     */
    public static $model = \App\Models\Province::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = ['name', 'country.name'];

    /**
     * The relationships that should be eager loaded when performing an index query.
     *
     * @var array
     */
    public static $with = ['country'];

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make(Country::singularLabel(), 'country', Country::class)
                ->withoutTrashed()
                ->searchable()
                ->withSubtitles()
                ->rules('required', 'integer', 'exists:countries,id'),

            Boolean::make('Habilitado', 'enabled')
                ->rules('required', 'boolean'),

            Text::make('Nombre', 'name')
                ->rules('required', 'string', 'max:255'),
        ];
    }

    /**
     * Get the displayable label of the resource.
     */
    public static function label(): string
    {
        return 'Provincias / Departamentos / Estados';
    }

    /**
     * Get the displayable singular label of the resource.
     */
    public static function singularLabel(): string
    {
        return 'Provincia / Departamento / Estado';
    }

    /**
     * Get the search result subtitle for the resource.
     */
    public function subtitle(): ?string
    {
        return $this->country?->name;
    }
}
