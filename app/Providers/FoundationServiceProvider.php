<?php
declare(strict_types=1);

namespace App\Providers;

use App\Foundation\Redirect\Redirect;
use App\Foundation\Redirect\RedirectInterface;
use App\Foundation\Validation\Validator;
use App\Foundation\Validation\ValidatorInterface;
use Illuminate\Support\ServiceProvider;

final class FoundationServiceProvider extends ServiceProvider
{
    /**
     * Register all classes in the App\Foundation namespace.
     */
    public function register(): void
    {
        $this->app->singleton(ValidatorInterface::class, Validator::class);
        $this->app->singleton(RedirectInterface::class, Redirect::class);
    }
}