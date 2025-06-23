# Approute PHP Router

**Educational & Recreational Use Only**

This project is a simple PHP router implementation designed for learning and experimentation. It is **not intended for production use**. Use it to understand basic routing concepts and how to build a minimal HTTP router in PHP.

## Features

- Define routes for GET and POST requests
- Simple handler functions for each route
- Automatic request and response object injection
- Basic error handling
- Minimal dependencies (uses Composer for autoloading)

## Project Structure

```
bootstrap.php           # Project bootstrap file
composer.json           # Composer dependencies
helpers/functions.php   # Helper functions
http/                  # Core HTTP classes
  Request.php          # Request abstraction
  Response.php         # Response abstraction
  Router.php           # Router implementation
public/index.php        # Entry point (example usage)
tests/RouterTest.php    # Basic tests
vendor/                 # Composer dependencies
```

## Example Usage

See `public/index.php`:

```php
$router = new Router;

$router->get('/', function (Request $request, Response $response) {
    return $response->text('hello, world');
});

$router->get('/about', function (Request $request, Response $response) {
    return $response->json(["name" => "Cristina", "status" => "MILF"]);
});

$router->get('/text', function (Request $request, Response $response) {
    return "Hello, text"; // Note: returning a string is not handled by default
});

$router->dispatch();
```

## How It Works

- Define routes using `$router->get($path, $handler)` or `$router->post($path, $handler)`.
- Handlers receive a `Request` and `Response` object.
- If a handler returns a `Response` object, it is sent to the client.
- If a handler returns a string or other type, it is currently ignored (can be extended).
- 404 and 500 errors are handled with simple text responses.

## Limitations

- No middleware, authentication, or advanced features
- No support for route parameters or wildcards
- Not secure or robust for real-world applications
- **For educational and recreational programming only**

## Getting Started

1. Clone the repository
2. Run `composer install`
3. Start a PHP server in the `public` directory:
   ```sh
   php -S localhost:8000 -t public
   ```
4. Visit `http://localhost:8000` in your browser

## Handler Return Values

The core of the router is the `executeHandler` method, which determines how handler return values are processed:

- If your handler returns a `Response` object (e.g., `$response->text('hello')`), it will be sent to the client as-is.
- If your handler returns a string (e.g., `return "Hello, world!";`), the router will automatically wrap it in a text response and send it to the client.
- If your handler returns any other type or nothing, no response will be sent unless you modify the router.

**Example:**

```php
$router->get('/text', function (Request $request, Response $response) {
    return "Hello, text"; // This string will be sent as a plain text response
});

$router->get('/json', function (Request $request, Response $response) {
    return $response->json(["foo" => "bar"]); // This will be sent as JSON
});
```

This makes it easy to return simple responses without always constructing a `Response` object.

## License

MIT License (see LICENSE file)

---

**Warning:** This project is for learning and fun. Do not use in production environments.
