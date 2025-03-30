<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Log;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        AuthorizationException::class,
        AuthenticationException::class,
        HttpResponseException::class,
        HttpException::class,
        ValidationException::class,
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {
        // 🚀 Log all 403 errors for debugging
        if ($exception instanceof AuthorizationException) {
            Log::error('🚨 403 Forbidden Error Detected', [
                'URL' => $request->fullUrl(),
                'User' => auth()->user(),
                'Exception' => $exception->getMessage(),
                'Route' => $request->route() ? $request->route()->getName() : null,
                'Headers' => $request->headers->all(),
            ]);
        }

        return parent::render($request, $exception);
    }
}
