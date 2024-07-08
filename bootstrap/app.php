<?php

use Illuminate\Foundation\Application;
use Illuminate\Contracts\Http\Kernel as HttpKernel;
use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Contracts\Debug\ExceptionHandler as ExceptionHandler;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    HttpKernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    ConsoleKernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Additional Configuration (if needed)
|--------------------------------------------------------------------------
|
| Here, we add additional configuration if required, using a hypothetical
| Application::configure method, if it exists.
|
*/

if (method_exists(Application::class, 'configure')) {
    return Application::configure(basePath: dirname(__DIR__))
        ->withRouting(
            web: __DIR__ . '/../routes/web.php',
            commands: __DIR__ . '/../routes/console.php',
            health: '/up'
        )
        ->withMiddleware(function (Middleware $middleware) {

            $middleware->alias([
                'admin.guest' => \App\Http\Middleware\AdminRedirect::class,
                'admin.auth' => \App\Http\Middleware\AdminAuthenticated::class,
            ]);

            $middleware->redirectTo(
                guests: '/account/login',
                users:  '/account/dashboard'
            );
        })
        ->withExceptions(function (Exceptions $exceptions) {
            // Define exception handling configuration here
        })
        ->create();
}

return $app;
