<?php

namespace App\Nova;

use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;

class SliderHome extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\SliderHome>
     */
    public static $model = \App\Models\SliderHome::class;

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

            Image::make('Imagén (1920x720)', 'image')
                ->path('slider/home')
                ->deletable(false)
                ->creationRules('required')
                ->rules('file', 'mimes:jpg,png,jpeg', 'dimensions:width=1920,height=720'),

            Image::make('Imagén mobile (480x720)', 'mobile_image')
                ->path('slider/home')
                ->deletable(false)
                ->creationRules('required')
                ->rules('file', 'mimes:jpg,png,jpeg', 'dimensions:width=480,height=720'),
        ];
    }

    /**
     * Get the displayable label of the resource.
     */
    public static function label(): string
    {
        return 'Imagenes de Home';
    }

    /**
     * Get the displayable singular label of the resource.
     */
    public static function singularLabel(): string
    {
        return 'Imagén de Home';
    }
}
