<?php

use Illuminate\Routing\Router;

$router->group(['prefix' =>'/ilinker/v1'], function (Router $router) {
    $router->apiCrud([
      'module' => 'ilinker',
      'prefix' => 'externalobjectmappings',
      'controller' => 'ExternalObjectMappingApiController',
      'permission' => 'ilinker.externalobjectmappings',
      //'middleware' => ['create' => [], 'index' => [], 'show' => [], 'update' => [], 'delete' => [], 'restore' => []],
      // 'customRoutes' => [ // Include custom routes if needed
      //  [
      //    'method' => 'post', // get,post,put....
      //    'path' => '/some-path', // Route Path
      //    'uses' => 'ControllerMethodName', //Name of the controller method to use
      //    'middleware' => [] // if not set up middleware, auth:api will be the default
      //  ]
      // ]
    ]);
    $router->apiCrud([
      'module' => 'ilinker',
      'prefix' => 'externalobjects',
      'controller' => 'ExternalObjectApiController',
      'permission' => 'ilinker.externalobjects',
      //'middleware' => ['create' => [], 'index' => [], 'show' => [], 'update' => [], 'delete' => [], 'restore' => []],
      // 'customRoutes' => [ // Include custom routes if needed
      //  [
      //    'method' => 'post', // get,post,put....
      //    'path' => '/some-path', // Route Path
      //    'uses' => 'ControllerMethodName', //Name of the controller method to use
      //    'middleware' => [] // if not set up middleware, auth:api will be the default
      //  ]
      // ]
    ]);
// append


});
