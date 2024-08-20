<?php
namespace App\Core;


class Request {
    private $type;
    private $body;
    private $headers;

    public function __construct() {
        $this->type = $_SERVER['REQUEST_METHOD']; // GET, POST, PUT, DELETE, etc.
        $this->body = $this->parseBody();
        $this->headers = $this->parseHeaders();
    }

    private function parseBody() {
        $body = [];
        switch ($this->type) {
            case 'POST':
            case 'PUT':
                $body = $_POST;
                break;
            case 'DELETE':
                parse_str(file_get_contents('php://input'), $body);
                break;
            default:
                break;
        }
        return $body;
    }

    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        $position = strpos($path, '?');

        if ($position === false) {
            return $path;
        }

        return substr($path, 0, $position);
    }

    public function getMethod(): string
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        if (!isset($method)) {
            $method  = "get";
        }
        return $method;
    }

    private function parseHeaders() {
        $headers = [];
        foreach ($_SERVER as $key => $value) {
            if (strpos($key, 'HTTP_') === 0) {
                $header = str_replace('_', '-', substr($key, 5));
                $headers[$header] = $value;
            }
        }
        return $headers;
    }

    public function getType() {
        return $this->type;
    }

    public function getBody() {
        return $this->body;
    }

    public function getHeader($name) {
        $header = str_replace(' ', '-', ucwords(strtolower($name)));
        return isset($this->headers[$header]) ? $this->headers[$header] : null;
    }
}
