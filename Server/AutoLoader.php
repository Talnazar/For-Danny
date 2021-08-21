<?php

function loadRepository($file_name)
{
	$path = __DIR__ . '/Class/Repository/';
	$extension = '.php';
	$path_to_file = $path . $file_name . $extension;

	if (file_exists($path_to_file)) {
		require_once $path_to_file;
	}
}
function loadShower($file_name)
{
	$path = __DIR__ . '/Class/Shower/';
	$extension = '.php';
	$path_to_file = $path . $file_name . $extension;

	if (file_exists($path_to_file)) {
		require_once $path_to_file;
	}
}
function loadValidator($file_name)
{
	$path = __DIR__ . '/Class/Validator/';
	$extension = '.php';
	$path_to_file = $path . $file_name . $extension;

	if (file_exists($path_to_file)) {
		require_once $path_to_file;
	}
}
function loadConnect($file_name)
{
	$path = __DIR__ . '/Class/';
	$extension = '.php';
	$path_to_file = $path . $file_name . $extension;

	if (file_exists($path_to_file)) {
		require_once $path_to_file;
	}
}


spl_autoload_register('loadRepository');
spl_autoload_register('loadShower');
spl_autoload_register('loadValidator');
spl_autoload_register('loadConnect');
