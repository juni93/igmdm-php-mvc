<?php

require 'lib/AltoRouter.php';

$router = new AltoRouter();
$router->setBasePath('/project');

// map Landing Page using callable
$router->map( 'GET', '/', function() {
    require __DIR__ . '/controller/index.php';
});

// map home page using callable
$router->map( 'GET', '/home', function() {
    require __DIR__ . '/controller/index.php';
});

// map Articles listing page using callable
$router->map( 'GET', '/articles', function() {
    require __DIR__ . '/controller/listarticles.php';
});

// map decklists listing page using callable
$router->map( 'GET', '/decklists', function() {
    require __DIR__ . '/controller/listdecks.php';
});

// map Article listing by format page using callable
$router->map( 'GET', '/articles-by-format/[:action]/[i:id]', function($name, $id) {
    require __DIR__ . '/controller/articles-by-format.php';
});

// map decklists listing by format page using callable
$router->map( 'GET', '/decklists-by-format/[:action]/[i:id]', function($name, $id) {
    require __DIR__ . '/controller/decklists-by-format.php';
});

// map articles by user route using callable
$router->map( 'GET', '/articles-by-user/[i:id]', function($id) {
    require __DIR__ . '/controller/articles-by-user.php';
});

// map decklists by user route using callable
$router->map( 'GET', '/decklists-by-user/[i:id]', function($id) {
    require __DIR__ . '/controller/decklists-by-user.php';
});

// map Events listing page using callable
$router->map( 'GET', '/events', function() {
    require __DIR__ . '/controller/events.php';
});

// map create article page using callable
$router->map( 'GET', '/new-article', function() {
    require __DIR__ . '/controller/createarticles.php';
});

// map create article page using callable
$router->map( 'GET', '/new-deck', function() {
    require __DIR__ . '/controller/createdecks.php';
});

// map creating new  page using callable
$router->map( 'POST', '/creating-new-article', function() {
    require __DIR__ . '/controller/createarticles.php';
});


// map creating new  page using callable
$router->map( 'POST', '/creating-new-decklist', function() {
    require __DIR__ . '/controller/createdecks.php';
});
// map create new event page using callable
$router->map( 'GET', '/new-event', function() {
    require __DIR__ . '/controller/createevents.php';
});
// map admin-area route using callable
$router->map( 'GET', '/admin-area', function() {
    require __DIR__ . '/controller/login.php';
});
// map article route using callable
$router->map( 'GET', '/article/[i:id]/[:action]', function() {
    require __DIR__ . '/controller/article.php';
});
// map decklist route using callable
$router->map( 'GET', '/decklist/[i:id]/[:action]', function() {
    require __DIR__ . '/controller/decklist.php';
});
// map edit article route using callable
$router->map( 'GET', '/edit-article/[i:id]', function() {
    require __DIR__ . '/controller/editarticle.php';
});
// map submit updated route page using callable
$router->map( 'POST', '/update-article/[i:id]', function() {
    require __DIR__ . '/controller/update-article.php';
});
// map logout route using callable
$router->map( 'GET', '/logout', function() {
    require __DIR__ . '/controller/logout.php';
});
// map login route using callable
$router->map( 'POST', '/login', function() {
    require __DIR__ . '/controller/login.php';
});
// map publish article route using callable
$router->map( 'GET', '/publish-article/[i:id]', function() {
    require __DIR__ . '/controller/publisharticle.php';
});

// map create new event submit route using callable
$router->map( 'POST', '/create-new-event', function() {
    require __DIR__ . '/controller/createevents.php';
});

// map api route using callable
$router->map( 'GET', '/load-data', function() {
    require __DIR__ . '/controller/getAPIData.php';
});

// map api route using callable
$router->map( 'POST', '/load-data', function() {
    require __DIR__ . '/controller/getAPIData.php';
});

// map Profile route using callable
$router->map( 'GET', '/profile', function() {
    require __DIR__ . '/controller/profile.php';
});

// map Edit Profile route using callable
$router->map( 'GET', '/edit-profile', function() {
    require __DIR__ . '/controller/edit-profile.php';
});

// map submit updated profile route page using callable
$router->map( 'POST', '/update-profile', function() {
    require __DIR__ . '/controller/update-profile.php';
});

// map submit updated profile route page using callable
$router->map( 'GET', '/create-new-users', function() {
    require __DIR__ . '/controller/new-users.php';
});

$router->map( 'POST', '/new-user', function() {
    require __DIR__ . '/controller/new-users.php';
});




// match current request url
$match = $router->match();


// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}












/* $parsed_url = parse_url($_SERVER['REQUEST_URI']);
echo "<pre>";
var_export($_SERVER);
echo "</pre>"; 
 */



/* $route = new Route();

$route->add('/', function(){
	echo "this is home";
});
$route->add('/about', function(){
	echo 'aaaaaaaaaaaaaaaaaaaaaaabout';
});
$route->add('/contact', 'contact');
echo "<pre>";
print_r($route);
echo "</pre>";
$route->submit(); */
