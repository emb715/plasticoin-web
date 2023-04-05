<?php

namespace App\Nova;

use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;

class SliderBenefit extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\SliderBenefit>
     */
    public static $model = \App\Models\SliderBenefit::class;

    /**
     * Indicates if the resource should be searchable on the index view.
     *
     * @var bool
     */
    public static $searchable = false;

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(NovaRequest $request): array
    {
        return [
            URL::make('Url', 'url')
                ->rules('nullable', 'url', 'max:255'),

            Image::make('Imagén (1080x1080)', 'image')
                ->path('slider/benefit')
                ->deletable(false)
                ->creationRules('required')
                ->rules('file', 'mimes:jpg,png,jpeg', 'dimensions:width=1080,height=1080'),
        ];
    }

    /**
     * Get the displayable label of the resource.
     */
    public static function label(): string
    {
        return 'Imagenes de beneficios';
    }

    /**
     * Get the displayable singular label of the resource.
     */
    public static function singularLabel(): string
    {
        return 'Imagén de beneficios';
    }
}
