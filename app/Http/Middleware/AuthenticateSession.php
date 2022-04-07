<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class AuthenticateSession
{
    /**
     * The authentication factory implementation.
     *
     * @var AuthFactory
     */
    protected $auth;

    private $defaultDriverGuard = 'sanctum';


    /**
     * Create a new middleware instance.
     *
     * @param AuthFactory $auth
     * @return void
     */
    public function __construct(AuthFactory $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! $request->hasSession() || ! $request->user()) {
            return $next($request);
        }

        if ($this->guard()->viaRemember()) {
            $passwordHash = explode('|', $request->cookies->get($this->auth->getRecallerName()))[2] ?? null;

            if (! $passwordHash || $passwordHash != $request->user()->getAuthPassword()) {
                $this->logout($request);
            }
        }

        if (! $request->session()->has('password_hash_'.$this->defaultDriverGuard)) {
            $this->storePasswordHashInSession($request);
        }

        if ($request->session()->get('password_hash_'.$this->defaultDriverGuard) !== $request->user()->getAuthPassword()) {
            $this->logout($request);
        }

        return tap($next($request), function () use ($request) {
            if (! is_null($this->guard()->user())) {
                $this->storePasswordHashInSession($request);
            }
        });
    }

    /**
     * Store the user's current password hash in the session.
     *
     * @param  Request  $request
     * @return void
     */
    protected function storePasswordHashInSession($request)
    {
        if (! $request->user()) {
            return;
        }

        $request->session()->put([
            'password_hash_'.$this->defaultDriverGuard => $request->user()->getAuthPassword(),
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param  Request  $request
     * @return void
     *
     * @throws AuthenticationException
     */
    protected function logout($request)
    {
        $this->guard()->logoutCurrentDevice();

        $request->session()->flush();

        throw new AuthenticationException('Unauthenticated.', [$this->defaultDriverGuard]);
    }

    /**
     * Get the guard instance that should be used by the middleware.
     *
     * @return AuthFactory|Guard
     */
    protected function guard()
    {
        return $this->auth;
    }
}
