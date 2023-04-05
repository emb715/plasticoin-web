<?php

namespace App\Nova;

use App\Nova\Panels\HasAddressPanel;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Company extends Resource
{
    use HasAddressPanel;

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Company>
     */
    public static $model = \App\Models\Company::class;

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
            ID::make()->sortable(),

            Boolean::make('¿Habilitado?', 'enabled')
                ->rules('required', 'boolean'),

            Text::make('Nombre', 'name')
                ->rules('required', 'string', 'max:255'),

            Image::make('Imagen', 'image')
                ->path('empresas')
                ->deletable(false)
                ->rules('max:10024', 'file', 'mimes:jpeg,jpg,png')
                ->creationRules('required'),

            Textarea::make('Descripción', 'description')
                ->rules('nullable', 'string', 'max:1024')
                ->alwaysShow(),

            URL::make('Url', 'url')
                ->rules('required', 'url')
                ->hideFromIndex(),

            Number::make('Vouchers emitidos', 'vouchers_count')
                ->exceptOnForms()
                ->sortable()
                ->textAlign(Text::CENTER_ALIGN),

            Number::make('Cantidad de Plasticoins', 'vouchers_sum_value')
                ->exceptOnForms()
                ->sortable()
                ->textAlign(Text::CENTER_ALIGN),

            Number::make('Voucher Promedio', 'vouchers_avg_value')
                ->exceptOnForms()
                ->sortable()
                ->displayUsing(
                    fn ($value) => number_format($value, 4)
                )
                ->textAlign(Text::CENTER_ALIGN),

            (new Panel('Datos de Contacto', [

                Email::make('Email', 'email')
                    ->rules('nullable', 'email', 'max:255')
                    ->hideFromIndex(),

                Text::make('Teléfono', 'phone')
                    ->rules('nullable', 'string', 'max:255')
                    ->hideFromIndex(),

            ]))->withToolbar(),

            $this->addressPanel([

                Text::make('Días', 'open_days')
                    ->rules('required', 'string', 'max:255')
                    ->hideFromIndex(),

                Text::make('Horarios', 'open_times')
                    ->rules('required', 'string', 'max:255')
                    ->hideFromIndex(),
            ]),

            (new Panel('Redes Sociales', [

                URL::make('Instagram')
                    ->rules('nullable', 'url', 'max:255')
                    ->hideFromIndex(),

                URL::make('Facebook')
                    ->rules('nullable', 'url', 'max:255')
                    ->hideFromIndex(),

                URL::make('Youtube')
                    ->rules('nullable', 'url', 'max:255')
                    ->hideFromIndex(),
            ]))->withToolbar(),

            HasMany::make(Benefit::label(), 'benefits', Benefit::class),
        ];
    }

    /**
     * Get the displayable label of the resource.
     */
    public static function label(): string
    {
        return 'Locales';
    }

    /**
     * Get the displayable singular label of the resource.
     */
    public static function singularLabel(): string
    {
        return 'Local';
    }
}
