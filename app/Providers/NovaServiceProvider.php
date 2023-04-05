<?php

namespace App\Providers;

use App\Nova\Benefit;
use App\Nova\City;
use App\Nova\Client;
use App\Nova\CollectionCenter;
use App\Nova\Company;
use App\Nova\Country;
use App\Nova\Dashboards;
use App\Nova\PlasticDelivery;
use App\Nova\Plasticoin;
use App\Nova\Province;
use App\Nova\SliderBenefit;
use App\Nova\SliderHome;
use App\Nova\Transfer;
use App\Nova\User;
use App\Nova\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        parent::boot();

        $this->userMenu();

        $this->menu();

        $this->footer();

        Nova::withoutGlobalSearch();

        Nova::withoutNotificationCenter();
    }

    /**
     * Register the Nova routes.
     */
    protected function routes(): void
    {
        Nova::routes()->withAuthenticationRoutes();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     */
    protected function gate(): void
    {
        Gate::define(
            'viewNova',
            fn ($user) => $user->canAccessAdminPanel()
        );
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     */
    protected function dashboards(): array
    {
        return [
            new Dashboards\Main,
        ];
    }

    /**
     * Nova user menu.
     */
    private function userMenu(): void
    {
        Nova::userMenu(function (Request $request, Menu $menu) {
            $menu->prepend(
                MenuItem::make(
                    __('Mi perfil'),
                    '/resources/' . User::uriKey() . "/{$request->user()->getKey()}"
                )
            );

            return $menu;
        });
    }

    /**
     * Nova Mail Menu.
     */
    private function menu(): void
    {
        Nova::mainMenu(function (Request $request) {
            return [

                MenuSection::dashboard(Dashboards\Main::class)->icon('chart-bar'),
                MenuSection::resource(Plasticoin::class)->icon('currency-dollar'),

                MenuSection::make('Movimientos', [
                    MenuItem::resource(PlasticDelivery::class),
                    MenuItem::resource(Transfer::class),
                    MenuItem::resource(Voucher::class),
                ])->icon('switch-horizontal'),

                MenuSection::make('Sistema', [
                    MenuItem::resource(CollectionCenter::class),
                    MenuItem::resource(Company::class),
                    MenuItem::resource(Benefit::class),
                ])->icon('cog'),

                MenuSection::resource(User::class)->icon('users')
                    ->canSee(
                        fn (NovaRequest $request) => $request->user()->isAdmin()
                    ),

                MenuSection::make('Sitio Web', [
                    MenuItem::resource(Client::class),
                    MenuItem::resource(SliderHome::class),
                    MenuItem::resource(SliderBenefit::class),
                ])->icon('globe'),

                MenuSection::make('Direcciones', [
                    MenuItem::resource(Country::class),
                    MenuItem::resource(Province::class),
                    MenuItem::resource(City::class),
                ])->icon('location-marker')->collapsedByDefault(),
            ];
        });
    }

    /**
     * Set the Nova footer.
     */
    private function footer(): void
    {
        Nova::footer(fn () => Blade::render('
            <p class="text-center">Desarrollado por <a class="link-default" href="https://ivirtual.la">iVirtual</a> · v{!! $version !!}</p>
            <p class="text-center">&copy; {!! $year !!}</p>
        ', [
            'version' => Nova::version(),
            'year' => date('Y'),
        ]));
    }
}
