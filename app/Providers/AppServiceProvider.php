<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        if (config("app.env") === "production" || env("APP_ENV") === "production") {
            URL::forceScheme("https");
        }

        // ?? Fix for SQLite on Render
        if (env("DB_CONNECTION") === "sqlite") {
            $dbPath = database_path("database.sqlite");
            if (!file_exists($dbPath)) {
                touch($dbPath);
            }
        }
    }
}
