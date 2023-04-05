<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Tag;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Benefit extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Benefit>
     */
    public static $model = \App\Models\Benefit::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The relationships that should be eager loaded when performing an index query.
     *
     * @var array
     */
    public static $with = ['company'];

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = ['name', 'company.name'];

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            Boolean::make('¿Habilitado?', 'enabled')
                ->rules('required', 'boolean'),

            BelongsTo::make(Company::singularLabel(), 'company', Company::class)
                ->withoutTrashed()
                ->rules('required', 'integer', 'exists:companies,id')
                ->searchable(),

            Text::make('Nombre', 'name')
                ->rules('required', 'string', 'max:255'),

            Number::make('Valor (Plasticoins)', 'value')
                ->min(0)
                ->max(999999)
                ->step(1)
                ->rules('required', 'numeric', 'between:0,999999')
                ->textAlign(Text::CENTER_ALIGN),

            Text::make('Promoción', 'promotion')
                ->rules('required_if:product,false', 'string', 'max:255')
                ->hide()
                ->dependsOn('product', function (Text $field, NovaRequest $request) {
                    $request->product
                        ? $field->hide()
                        : $field->show();
                })
                ->fillUsing(
                    fn (NovaRequest $request, $model) => $model->promotion = $request->product ? null : $request->promotion
                ),

            (new Panel('Producto', [

                Boolean::make('¿Es un producto?', 'product')
                    ->rules('required', 'boolean'),

                Image::make('Imagen', 'image')
                    ->deletable(false)
                    ->path('productos')
                    ->creationRules('required_if:product,true')
                    ->rules('max:10024', 'file', 'mimes:jpeg,jpg,png')
                    ->hide()
                    ->dependsOn('product', function (Image $field, NovaRequest $request) {
                        $request->product
                            ? $field->show()->rules('required')
                            : $field->hide();
                    }),

            ]))->withToolbar(),

            Tag::make(CollectionCenter::label(), 'collectionCenters', CollectionCenter::class),
        ];
    }

    /**
     * Get the search result subtitle for the resource.
     */
    public function subtitle(): ?string
    {
        return $this->company?->name;
    }

    /**
     * Get the displayable label of the resource.
     */
    public static function label(): string
    {
        return 'Beneficios';
    }

    /**
     * Get the displayable singular label of the resource.
     */
    public static function singularLabel(): string
    {
        return 'Beneficio';
    }
}
