<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
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
     *
     * @return void
     */
    public function register(): void
    {
        $statusCodes = Response::$statusTexts;

        $this->reportable(function (Throwable $e) {
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Record not found',
                ], 404);
            }

            return $e;
        });

        $this->renderable(function (QueryException $e, $request) {
            if ($request->is('api/*')) {
                if (env('APP_DEBUG')) {
                    $data['message'] = $e->getMessage();
                    $data['trace'] = $e->getTrace();
                } else {
                    $data['message'] = 'Server error';
                }

                return response()->json([
                    $data,
                ], 500);
            }

            return $e;
        });

        $this->renderable(function (\Exception $e, Request $request) use ($statusCodes) {

            if (!array_key_exists($e->getCode(), $statusCodes)) {
                $data['message'] = 'Server error';
                $errorCode = 500;
            } else {
                $data['message'] = $e->getMessage();
                $errorCode = $e->getCode();
            }

            if (env('APP_DEBUG')) {
                $data['trace'] = $e->getTrace();
            }

            if ($request->is('api/*')) {
                return response()->json($data, $errorCode);
            }

            return $e;
        });
    }

}
