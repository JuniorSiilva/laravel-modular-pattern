<?php

namespace Emtudo\Units\Users\Routes;

use Emtudo\Support\Http\Router;

class Api extends Router
{
    public function routes()
    {
        $this->router->get('/users/{user}', 'UserController@show')->middleware('auth');
        $this->router->post('/users', 'UserController@store');
        $this->router->put('/users/{user}', 'UserController@update');
    }
}