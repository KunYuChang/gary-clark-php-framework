<?php

namespace GaryClarke\Framework\Http;

class Request
{
	public function __construct(
		// $_GET, $_POST, $_COOKIE, $_FILES, $_SERVER
		public readonly array $getParams,
		public readonly array $postParams,
		public readonly array $cookies,
		public readonly array $files,
		public readonly array $server
	) {
	}

	public static function createFromGlobals(): static
	{
		return new self($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
	}
}