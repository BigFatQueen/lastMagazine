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
       $magazines=Magazine::orderBy('id','desc')->limit(3)->get();
        //$magazine=DB::table('articles')->get();
       // dd($articles);

        $faculty=Faculty::withCount(['magazines'=>function($q){
            $q->where('selected_status',1);
        }])->get();


        // $announces=Announce::orderBy('id','desc')->limit(5)->get();



        // $faculty=null;
        // $announces=null;
         // dd($announces);
        
            View::share('data',[$faculty,$magazines]);
    

       
    }
}
