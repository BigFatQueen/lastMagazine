<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Magazine;
use App\Faculty;
use App\Announce;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       

        $faculty=Faculty::withCount(['magazines'=>function($q){
            $q->where('selected_status',1);
        }])->get();


       



        
        
            View::share('data',[$faculty]);
    

       
    }
}
