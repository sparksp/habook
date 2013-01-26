<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::group(array('before' => 'auth'), function()
{
    Route::get('/', 'home@index');
    Route::any('logout', 'session@destroy');
});

Route::any('login', 'session@new');

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to_action('session@new');
});

Route::filter('email', function()
{
	// Start the Bundle (and IoC defaults)
	Bundle::start('swiftmailer');

	// Register a transporter in the IoC container
	// This will overwrite the swiftmailer default IoC
	IoC::register('mailer.transport', function()
	{
		// Retrieve the relevant information from config.
		// This is here to make configurations easier.
		$agents = Config::get('email.agents');
		$default = Config::get('email.default');

		if (!empty($agents) && !empty($agents[$default])) {

			$defaultAgent = $agents[$default];
			
			$transportClass = sprintf('Swift_%sTransport',
				ucfirst(strtolower($defaultAgent['transport']))
			);

			$transport = call_user_func(array($transportClass, 'newInstance'));

			// Verbose configuration settings.
			if (!empty($defaultAgent['hostname'])) {
				$transport->setHost( $defaultAgent['hostname'] );
			}

			if (!empty($defaultAgent['port'])) {
				$transport->setPort( $defaultAgent['port'] );
			}

			if (!empty($defaultAgent['username'])) {
				$transport->setUsername( $defaultAgent['username'] );
			}

			if (!empty($defaultAgent['password'])) {
				$transport->setPassword( $defaultAgent['password'] );
			}

			if (!empty($defaultAgent['command'])) {
				$transport->setCommand( $defaultAgent['command'] );
			}

			// Return the configured transport.
			return $transport;

		}

		// If no transport / config found, default to mail.
		return Swift_MailTransport::newInstance();
	});
});