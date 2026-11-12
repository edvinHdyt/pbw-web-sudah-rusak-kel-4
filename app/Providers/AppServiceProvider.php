<?php

namespace App\Providers;

use Filament\Http\Responses\Auth\Contracts\LogoutResponse;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // custom logout url
        $this->app->bind(LogoutResponse::class, function(){
            return new class implements LogoutResponse{
                public function toResponse($request){
                    return redirect("/login");
                }
            };
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
