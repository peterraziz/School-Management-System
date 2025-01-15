<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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

    // // ============ Added ======= :
    // public function render($request, Throwable $exception)
    // {
    //     if ($this->isHttpException($exception)) {
    //         // Check if the exception is a 404 error
    //         if ($exception->getStatusCode() == 404) {
    //             // Return the custom 404 view
    //             return response()->view('errors.404', [], 404);
    //         }
    //     }
    
    //     // Call the parent class's render method for other exceptions
    //     return parent::render($request, $exception);
    // }

}
