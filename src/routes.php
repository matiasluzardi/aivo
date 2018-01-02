<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

//1348339814
$app->get('/profile/facebook/{id}', function (Request $request, Response $response, array $args) {

  $id = $request->getAttribute('id');

  $fb = new \Facebook\Facebook([
  'app_id' => '2084223635139334',
  'app_secret' => 'cdcda49183a048a820154e0db4ed0343',
  'default_graph_version' => 'v2.11'
//  'default_access_token' => 'cdcda49183a048a820154e0db4ed0343', // optional
]);
    	
$helper = $fb->getRedirectLoginHelper(); 
try {

  $accessToken = $helper->getAccessToken(); 
  // Returns a `Facebook\FacebookResponse` object
   $responseFacebook = $fb->get('/'.$id.'?fields=id,first_name,last_name', "EAAdnlyFnqwYBAK4GXBMyEwmGFFODiO8uTNyRDENCvlAypPlB29GVEavfcPgxMdSHRukzkgFPBzzMnZAeraziAkNTZBXEsJVWNrqmWx4XTL3scVCLP1XV2kKBG5Bs46JLd912dKPZA9ZBZCaziNoyK68DQxjJnZCw0PkWh3nK5uNnXGmG9fuksRycOaDBsHDsDgAIBuVXCQqQZDZD");

} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
	
    $this->logger->info("Slim-Skeleton '/' route");
	$me = $responseFacebook->getGraphUser();
   
    $responseData = ["id"=>$me->getId(),"firstName"=>$me->getFirstName(),"lastName"=>$me->getLastName()];
    // Render index view
    return $this->response->withJson($responseData,200);
});
