<?php

namespace App\Providers;

use App\Modules\Backend\Website\User\Repositories\EloquentUserRepository;
use App\Modules\Backend\Website\User\Repositories\UserRepository;
use App\Modules\Backend\Website\Artist\Repositories\EloquentArtistRepository;
use App\Modules\Backend\Website\Artist\Repositories\ArtistRepository;
use App\Modules\Backend\Website\Music\Repositories\EloquentMusicRepository;
use App\Modules\Backend\Website\Music\Repositories\MusicRepository;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(
            UserRepository::class,
            EloquentUserRepository::class
        );
        $this->app->bind(
            ArtistRepository::class,
            EloquentArtistRepository::class
        );
        $this->app->bind(
            MusicRepository::class,
            EloquentMusicRepository::class
        );
    }
}
