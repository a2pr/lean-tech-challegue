<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AuthenticationException && $this->isApiRequest($request)) {
            return $this->handleApiAuthenticationError($request, $exception);
        }

        return parent::render($request, $exception);
    }

    protected function isApiRequest($request)
    {
        return $request->expectsJson() || strpos($request->path(), 'api') !== false;
    }

    protected function handleApiAuthenticationError($request, $exception)
    {
        return response()->json([], 401);
    }
}
