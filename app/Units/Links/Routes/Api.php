<?php

namespace Emtudo\Units\Links\Routes;

use Emtudo\Support\Http\Router;

class Api extends Router
{
    public function routes()
    {
        $this->router->get('/links', 'LinkController@index')->middleware('auth');
        $this->router->post('/links', 'LinkController@store');
        $this->router->get('/links/{link}', 'LinkController@show');
    }
}