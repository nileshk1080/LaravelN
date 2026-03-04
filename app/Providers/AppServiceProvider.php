<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\TicketUserAssignmentMapping;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void{
        View::composer('layouts.navbar2' , function($view){

            if(auth()->check()){
                $count = TicketUserAssignmentMapping::where('Assigned_User_id', auth()->id())
                    ->where('Seen', 0)
                    ->count();
                
                $view->with('newTicketCount' , $count);

            };

        });
    }
}
