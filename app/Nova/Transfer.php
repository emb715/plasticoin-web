<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Transfer extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Transfer>
     */
    public static $model = \App\Models\Transfer::class;

    /**
     * The relationships that should be eager loaded when performing an index query.
     *
     * @var array
     */
    public static $with = ['user', 'toUser'];

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'user.name',
        'toUser.name',
    ];

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('De', 'user', User::class)
                ->exceptOnForms(),

            BelongsTo::make('Para', 'toUser', User::class)
                ->withoutTrashed()
                ->rules('required', 'integer', 'exists:users,id')
                ->searchable(),

            Number::make('Cantidad', 'amount')
                ->min(0.0001)
                ->max(999999)
                ->step(0.0001)
                ->rules('required', 'numeric', 'between:0.0001,999999')
                ->textAlign(Text::CENTER_ALIGN),

            MorphMany::make(Plasticoin::label(), 'plasticoins', Plasticoin::class),
        ];
    }

    /**
     * Get the displayable label of the resource.
     */
    public static function label(): string
    {
        return 'Transferencias';
    }

    /**
     * Get the displayable singular label of the resource.
     */
    public static function singularLabel(): string
    {
        return 'Transferencia';
    }
}
