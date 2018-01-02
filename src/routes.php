<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

// get facebook profile by id
$app->get('/profile/facebook/{id}', function (Request $request, Response $response, array $args) {

	$id = $request->getAttribute('id');

	// minimal validation if the id is numeric
	if(!is_numeric($id)){
		return $this->response->withJson(["response"=>"error"],500);
	}

	// config params facebook
	$configFacebook = $this->get('settings')['facebook'];

	// object facebook api
	$fb = new \Facebook\Facebook([
		'app_id' => $configFacebook['app_id'],
		'app_secret' =>  $configFacebook['app_secret'],
		'default_graph_version' => 'v2.11'
		]);

	try {
	    // Returns a `Facebook\FacebookResponse` object
		$responseFacebook = $fb->get('/'.$id.'?fields=id,first_name,last_name', $configFacebook['token_temporal']);

	} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		exit;
	} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	
	// get user data 
	$me = $responseFacebook->getGraphUser();

	// build response json 
	$responseData = ["id"=>$me->getId(),"firstName"=>$me->getFirstName(),"lastName"=>$me->getLastName()];
    
    // Render index view
	return $this->response->withJson($responseData,200);
});
