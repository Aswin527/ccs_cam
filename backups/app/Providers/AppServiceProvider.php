<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Division;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        
        View::composer('layouts.app',function($view){
            $view->with('aboutus',Category::where('type',3)
                ->where('status',1)
                ->where('id',1)
                ->with(['pages' => function ($query) {
                    $query->where('status', 1);
                }])
                ->first()
            );
            //dd($view);
        });

        View::composer('layouts.app',function($view){
            $view->with('blogs',Category::where('type',2)
                ->where('status',1)
                ->get()
            );
        });

        View::composer('layouts.app',function($view){
            $view->with('prodcat',Category::where('status',1)->where('type',1)
                ->get()
            );
            //dd($view);
        });

        View::composer('layouts.app',function($view){
            $view->with('divisions',Division::where('status',1)
                ->get()
            );
            //dd($view);
        });

        View::composer('layouts.app',function($view){
            $view->with('gallery',Category::where('status',1)
                ->where('type',4)
                ->get()
            );
            //dd($view);
        });
        
        /*View::composer('layouts.app',function($view){
            $view->with('buisiness',Category::where('type',3)
                ->where('status',1)
                ->where('id',8)
                ->with(['pages' => function ($query) {
                    $query->where('status', 1);
                }])
                ->first()
            );
            //dd($view);
        });
        
        View::composer('layouts.app',function($view){
            $view->with('quicklink',Category::where('type',3)
                ->where('status',1)
                ->where('id',6)
                ->with(['pages' => function ($query) {
                    $query->where('status', 1);
                }])
                ->first()
            );
            //dd($view);
        });*/
    }
}
