<?php

namespace App\Nova;

use Laravel\Nova\Actions\ExportAsCsv;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Voucher extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Voucher>
     */
    public static $model = \App\Models\Voucher::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'value_with_plasticoins';

    /**
     * The relationships that should be eager loaded when performing an index query.
     *
     * @var array
     */
    public static $with = ['user', 'company', 'benefit'];

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'user.name',
        'company.name',
        'benefit.name',
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

            BelongsTo::make(User::singularLabel(), 'user', User::class)
                ->withoutTrashed()
                ->exceptOnForms(),

            BelongsTo::make(Company::singularLabel(), 'company', Company::class)
                ->withoutTrashed()
                ->exceptOnForms(),

            BelongsTo::make(Benefit::singularLabel(), 'benefit', Benefit::class)
                ->withoutTrashed()
                ->rules('required', 'exists:benefits,id')
                ->searchable()
                ->withSubtitles(),

            Text::make('Valor', 'value')
                ->exceptOnForms(),

            Text::make('Código', 'code')
                ->exceptOnForms(),

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
                    'ID de Local' => $model->company?->getKey(),
                    'ID de Beneficio' => $model->benefit?->getKey(),
                    'ID de Usuario' => $model->user?->getKey(),
                    'Local' => $model->company?->name,
                    'Beneficio' => $model->benefit?->name . ' - ' . $model->benefit?->promotion,
                    'Usuario' => $model->user?->name,
                    'Valor' => $model->value,
                    'Código' => $model->code,
                    'Creado el' => $model->created_at->format('d/m/Y'),
                ]),
        ];
    }
}
