<?php

namespace App\Nova;

use App\Nova\Panels\HasAddressPanel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rules;
use Laravel\Nova\Actions\ExportAsCsv;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class User extends Resource
{
    use HasAddressPanel;

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \App\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name_with_plasticoins';

    /**
     * The relationships that should be eager loaded when performing an index query.
     *
     * @var array
     */
    public static $with = ['country', 'province', 'city'];

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name', 'email', 'phone'
    ];

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Nombre', 'name')
                ->sortable()
                ->rules('required', 'max:255'),

            Email::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Text::make('Teléfono', 'phone')
                ->rules('required', 'string', 'max:254')
                ->creationRules('unique:users,phone')
                ->updateRules('unique:users,phone,{{resourceId}}')
                ->sortable(),

            Text::make('Plasticoins', 'plasticoins_sum_amount')
                ->exceptOnForms()
                ->sortable(),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', Rules\Password::defaults())
                ->updateRules('nullable', Rules\Password::defaults()),

            $this->addressPanel([

                Text::make('Ciudad cargada por Usuario', 'city')
                    ->exceptOnForms(),

            ], false),

            HasMany::make(Plasticoin::singularLabel(), 'plasticoins', Plasticoin::class),
        ];
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     */
    public static function indexQuery(NovaRequest $request, $query): Builder
    {
        if ($request->isFormRequest()) {
            return $query;
        }

        return $query->when(
            $request->user()->isNotAdmin(),
            fn ($query) => $query->where('id', $request->user()->getKey())
        );
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
                    'Nombre' => $model->name,
                    'Email' => $model->email,
                    'Teléfono' => $model->phone,
                    'País' => $model->country,
                    'Provincia' => $model->province,
                    'Ciudad' => $model->city,
                    'Plasticoins' => $model->plasticoins_amount,
                    'Creado el' => $model->created_at->format('d/m/Y'),
                ]),
        ];
    }

    /**
     * Get the displayable label of the resource.
     */
    public static function label(): string
    {
        return 'Usuarios';
    }

    /**
     * Get the displayable singular label of the resource.
     */
    public static function singularLabel(): string
    {
        return 'Usuario';
    }
}
