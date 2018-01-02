<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/profile/facebook/{id}', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    $id = $request->getAttribute('id');
    $responseData = ["id"=>$id,"firstName"=>"Juan","lastName"=>"Perez"];
    // Render index view
    return $this->response->withJson($responseData,200);
});
