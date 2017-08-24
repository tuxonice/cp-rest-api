<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Console\Commands\GpsCommand;

class CommandServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.gps.command', function()
        {
            return new GpsCommand;
        });

        $this->commands(
            'command.gps.command'
        );
    }
}
