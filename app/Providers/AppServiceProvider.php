<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

            Schema::defaultStringLength(191);
           
            view()->composer('seller.layouts',function($view)
                {
                    $id=Auth::guard('web_seller')->user()->id;
                    $seller=\App\Seller::find($id);
                    $acces=$seller->roles->count();
                    
                    if ($acces == 0) 
                    {
                        $view->with('modulos',FALSE);   
                    }
                    else
                    {
                      foreach ($seller->roles as $role)
                      {
                          $seller_modules[]=$role;
                      }   

                        $view->with('modulos',$seller_modules);

                    }                         
                });

            view()->composer('promoter.layouts.partials.SideBar',function($view)
                {
                    $id=Auth::guard('Promoter')->user()->id;
                    $permiso=\App\Promoters::find($id);
                    $acces=$permiso->license->count();
                    if ($acces == 0) 
                    {
                        $view->with('permiso',FALSE);   
                    }
                    else
                    {
                      $permiso->each(function ($permiso){
                        $permiso->license;
                      });   

                        $view->with('permiso',$permiso);
                    }                         
                });

           


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
