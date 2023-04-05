<?php

namespace App\Nova;

use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Actions\ExportAsCsv;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class PlasticDelivery extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\PlasticDelivery>
     */
    public static $model = \App\Models\PlasticDelivery::class;

    /**
     * The relationships that should be eager loaded when performing an index query.
     *
     * @var array
     */
    public static $with = ['collectionCenter', 'user'];

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'plastic_amount_with_kg';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'collectionCenter.name',
        'user.name',
    ];

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            DateTime::make('Creado el', 'created_at')
                ->exceptOnForms()
                ->filterable(),

            new Panel('Donde y Quíen', [

                BelongsTo::make(CollectionCenter::singularLabel(), 'collectionCenter', CollectionCenter::class)
                    ->withoutTrashed()
                    ->rules('required', 'integer', 'exists:collection_centers,id')
                    ->searchable($request->user()->isAdmin()),

                BelongsTo::make(User::singularLabel(), 'user', User::class)
                    ->withoutTrashed()
                    ->rules('required', 'integer', 'exists:users,id')
                    ->searchable(),
            ]),

            new Panel('Cantidad de Plastico reciclado', [

                Number::make('Plásticos Domiciliario', 'home_plastic_amount')
                    ->min(0)
                    ->max(30)
                    ->step(0.001)
                    ->default(0)
                    ->rules('required', 'numeric', 'between:0,30')
                    ->displayUsing(
                        fn ($value) => is_null($value) ? null : $value . ' kg'
                    )
                    ->sortable()
                    ->textAlign(Text::CENTER_ALIGN),

                Number::make('Plásticos de la playa', 'beach_plastic_amount')
                    ->min(0)
                    ->max(20)
                    ->step(0)
                    ->default(0)
                    ->rules('required', 'numeric', 'between:0,20')
                    ->displayUsing(
                        fn ($value) => is_null($value) ? null : $value . ' kg'
                    )
                    ->sortable()
                    ->textAlign(Text::CENTER_ALIGN),

                Number::make('Micro plásticos de la playa', 'micro_plastic_amount')
                    ->min(0)
                    ->max(2)
                    ->step(0.0001)
                    ->default(0)
                    ->rules('required', 'numeric', 'between:0,2')
                    ->displayUsing(
                        fn ($value) => is_null($value) ? null : $value . ' kg'
                    )
                    ->sortable()
                    ->textAlign(Text::CENTER_ALIGN),

                Number::make('Plastico total', 'plastic_amount')
                    ->exceptOnForms()
                    ->displayUsing(
                        fn ($value) => is_null($value) ? null : $value . ' kg'
                    )
                    ->sortable()
                    ->textAlign(Text::CENTER_ALIGN),

            ]),

            MorphMany::make(Plasticoin::label(), 'plasticoins', Plasticoin::class),
        ];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(NovaRequest $request): array
    {
        return [
            ExportAsCsv::make()
                ->nameable()
                ->withTypeSelector('csv')
                ->withFormat(fn ($model) => [
                    '#' => $model->getKey(),
                    'ID de Centro de Acopio' => $model->collectionCenter?->getKey(),
                    'ID de Usuario' => $model->user?->getKey(),
                    'Centro de Acopio' => $model->collectionCenter?->name,
                    'Usuario' => $model->user?->name,
                    'Plásticos Domiciliarios' => $model->home_plastic_amount,
                    'Plásticos de la playa' => $model->beach_plastic_amount,
                    'Micro Plásticos de la playa' => $model->micro_plastic_amount,
                    'Plástico total' => $model->plastic_amount,
                    'Creado el' => $model->created_at->format('d/m/Y'),
                ]),
        ];
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     */
    public static function indexQuery(NovaRequest $request, $query): Builder
    {
        return $query->when(
            $request->user()->isNotAdmin(),
            fn ($query) => $query
                ->whereIn(
                    'collection_center_id',
                    $request->user()->collection_center_ids
                )
        );
    }

    /**
     * Get the displayable label of the resource.
     */
    public static function label(): string
    {
        return 'Entregas de Plasticos';
    }

    /**
     * Get the displayable singular label of the resource.
     */
    public static function singularLabel(): string
    {
        return 'Entrega de Plasticos';
    }
}
