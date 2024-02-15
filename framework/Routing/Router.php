<?php

namespace GaryClarke\Framework\Routing;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use GaryClarke\Framework\Http\HttpException;
use GaryClarke\Framework\Http\HttpRequestMethodException;
use GaryClarke\Framework\Http\Request;
use function FastRoute\simpleDispatcher;

class Router implements RouterInterface
{
	public function dispatch(Request $request): array
	{
		$routeInfo = $this->extractRouteInfo($request);

		[$handler, $vars] = $routeInfo;

		// 如果 routes/web.php 採用 Controller
		if (is_array($handler)) {
			[$controller, $method] = $handler;
			$handler = [new $controller, $method];
		}

		// 否則就直接使用$handler
		return [$handler, $vars];
	}

	private function extractRouteInfo(Request $request)
	{
		// Create a dispatcher
		$dispatcher = simpleDispatcher(function (RouteCollector $routeCollector) {

			$routes = include BASE_PATH . '/routes/web.php';

			foreach ($routes as $route) {
				$routeCollector->addRoute(...$route);
			}
		});

		// Dispatch a URI, to obtain the route info
		$routeInfo = $dispatcher->dispatch(
			$request->getMethod(),
			$request->getPathInfo(),
		);


		// Exception 會在 Kernel.php 被接到
		switch ($routeInfo[0]) {
			case Dispatcher::FOUND:
				return [$routeInfo[1], $routeInfo[2]]; // routeHandler, vars
			case Dispatcher::METHOD_NOT_ALLOWED:
				$allowedMethods = implode(', ', $routeInfo[1]);
				$e = new HttpRequestMethodException("The allowed methods are $allowedMethods");
				$e->setStatusCode(405);
				throw $e;
			default:
				$e = new HttpException('Not found');
				$e->setStatusCode(404);
				throw $e;
		}
	}
}