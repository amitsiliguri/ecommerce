<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Auth\AuthenticationException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    protected function redirectToCustomer($request)
    {
        if (! $request->expectsJson()) {
            return route('customer.account.login');
        }
    }

    protected function unauthenticated($request, array $guards)
    {
        switch ($guards[0]) {
            case 'customer':
                throw new AuthenticationException(
                    'Unauthenticated.', $guards, $this->redirectToCustomer($request)
                );
                break;
            default:
                throw new AuthenticationException(
                    'Unauthenticated.', $guards, $this->redirectTo($request)
                );
                break;
        }
        
    }
}
