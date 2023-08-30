<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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

    /**
     * Render.
     */
    public function render($request, Throwable $exception)
    {
        /**
         * Eğer API'de bir hata meydana geliyorsa, bunu kullanıcılara hata mesajı dönütü olarak
         * gönderiyoruz.
         */
        if ($request->is('api/*')) 
        {
            return response()->json([
                'status' => false,
                'message' => 'Beklenmeyen bir hata oluştu.',
                'exception' => $exception->getMessage(),
            ], 500);
        }

        return parent::render($request, $exception);
    }
}
