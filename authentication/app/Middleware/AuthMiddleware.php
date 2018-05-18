<?php


namespace App\Middleware;

class AuthMiddleware extends Middleware
{
    public function __invoke($request, $response, $next)
	{

        if($this->container->auth->check())
        {
            $this->container->flash->addMessage('error','You must login first! ');           
        } 
       $response = $next($request, $response);
        return $response;
    }
}