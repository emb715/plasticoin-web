<?php

namespace App\Nova;

use App\Nova\Panels\HasAddressPanel;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class CollectionCenter extends Resource
{
    use HasAddressPanel;

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\CollectionCenter>
     */
    public static $model = \App\Models\CollectionCenter::class;

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
    public static $search = ['name'];

    /**
     * The relationships that should be eager loaded when performing an index query.
     *
     * @var array
     */
    public static $with = ['country', 'province', 'city'];

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(NovaRequest $request): array
    {
        return [
            (new Panel('Datos Principales', [

                ID::make(),

                Boolean::make('¿Habilitado?', 'enabled')
                    ->rules('required', 'boolean'),

                Text::make('Nombre', 'name')
                    ->rules('required', 'string', 'max:255'),

                Image::make('Imagen', 'image')
                    ->path('centros-de-acopio')
                    ->deletable(false)
                    ->creationRules('required')
                    ->rules('max:10024', 'file', 'mimes:jpeg,jpg,png'),

                Textarea::make('Descripción', 'description')
                    ->rules('nullable', 'string', 'max:1024')
                    ->alwaysShow(),

                URL::make('Url', 'url')
                    ->rules('required', 'url')
                    ->hideFromIndex(),

                Number::make('Entregas de Plastico', 'plastic_deliveries_count')
                    ->exceptOnForms()
                    ->sortable()
                    ->textAlign(Text::CENTER_ALIGN),

                Number::make('Entrega de plastico (kg)', 'plastic_deliveries_sum_plastic_amount')
                    ->exceptOnForms()
                    ->sortable()
                    ->textAlign(Text::CENTER_ALIGN),

                Number::make('Entrega de plastico promedio (kg)', 'plastic_deliveries_avg_plastic_amount')
                    ->exceptOnForms()
                    ->displayUsing(fn ($value) => number_format($value, 4))
                    ->sortable()
                    ->textAlign(Text::CENTER_ALIGN),

            ]))->withToolbar(),

            $this->addressPanel([

                Text::make('Días', 'open_days')
                    ->rules('required', 'string', 'max:255')
                    ->hideFromIndex(),

                Text::make('Horarios', 'open_times')
                    ->rules('required', 'string', 'max:255')
                    ->hideFromIndex(),
            ]),

            BelongsToMany::make(User::label(), 'users', User::class)
                ->searchable(),
        ];
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query): Builder
    {
        if ($request->user()->isAdmin()) {
            return $query;
        }

        return $query->whereHas(
            'users',
            fn ($query) => $query->where('id', $request->user()->getKey())
        );
    }

    /**
     * Get the displayable label of the resource.
     */
    public static function label(): string
    {
        return 'Centros de Acopios';
    }

    /**
     * Get the displayable singular label of the resource.
     */
    public static function singularLabel(): string
    {
        return 'Centro de Acopio';
    }
}
