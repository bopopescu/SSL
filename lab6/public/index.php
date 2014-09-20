<?php
require '../vendor/autoload.php';

ORM::configure("mysql:host=localhost;dbname=ssl-lab6");
ORM::configure("username", "root");
ORM::configure("password", "root");

$app = new \Slim\Slim(array(
	'mode' => 'development',
	'debug' => true,
	'templates.path' => '../app/views/',
	'view' => new \Slim\Views\Twig()
	));
//routes here
$app->get('/', function() use ($app){
	$app->render('home.html');
});
$app->get('/blog', function() use ($app){
	$blog = ORM::for_table('blog')->find_many();
	$app->render('blog.html', array('blog' => $blog));
});
$app->get('/blog/:id', function($id) use ($app){
	$blog = ORM::for_table('blog')->find_many();
	$app->render('blog.html', array('id' => $id,'blog' => $blog));
});
$app->run();
?>