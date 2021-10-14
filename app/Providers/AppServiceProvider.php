<?php

namespace App\Providers;

use App\Entity\Project\Developer;
use App\Entity\Project\Projects\Project;
use App\Services\Banner\CostCalculator;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        view()->composer('*', function ($view){
            $gUserExists = \Auth::user();
            $locale = App::getLocale();
//            dd($locale);
            if ($gUserExists) {
                $gDeveloper = Developer::where('owner_id', $gUserExists->id)->get()->first();
                $view->with(compact(['gUserExists', 'locale', 'gDeveloper']));

            }
//            dd();
//            if ($gUserExists){
                $view->with(compact(['gUserExists', 'locale']));
//            }


        });
    }

    public function register(): void
    {
        $this->app->singleton(CostCalculator::class, function (Application $app) {
            $config = $app->make('config')->get('banner');
            return new CostCalculator($config['price']);
        });


        Passport::ignoreMigrations();
    }
}
