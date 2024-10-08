<?php

namespace App\Core;



class Router
{
    protected array $routes;
    protected string $redirect;
    protected Request $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    function get(string $path, $callable)
    {
        $this->routes['get'][$path] = new Route('get', $path, $callable);
    }

    function post(string $path, $callable)
    {
        $this->routes['post'][$path] = new Route('post', $path, $callable);
    }
    function delete(string $path, $callable)
    {
        $this->routes['delete'][$path] = new Route('delete', $path, $callable);
    }

    function route()
    {


        $path = $this->request->getPath();
        $method = $this->request->getMethod();


        $this->redirect = $path;



        $callback = $this->routes[$method][$path]->callable ?? null;


        if ($callback != null) {
            if (is_array($callback)) {
                if (method_exists($callback[0], $callback[1])) {

                    $callback[0] = new $callback[0];

                } else {
                    echo "no fucntion with that name ";
                   // $e = new NotFoundException();
                    //$e->render();
                }
            } else {
                echo "callback isn't array";
                //$e = new NotFoundException();
                //$e->render();
            }
        } else {
            echo "callback is null !!";
            //$e = new NotFoundException();
            //$e->render();
        }




        call_user_func($callback, $this->request);
    }
}
