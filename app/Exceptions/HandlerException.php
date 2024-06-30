<?php

namespace App\Exceptions;

use Exception;
use BadMethodCallException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    // Otros métodos de manejo de excepciones

    public function render($request, Exception $exception)
    {
        if ($exception instanceof BadMethodCallException) {
            return response()->json(['error' => 'No se puede eliminar el elemento en este momento.'], 500);
        }

        return parent::render($request, $exception);
    }
}
