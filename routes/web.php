<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

use GraphQL\GraphQL;
use GraphQL\Type\Schema;

Route::get('/', function () {
    return view('welcome');
});
Route::get('aaa', function(){
 return \App\Model\MensShopMains::where('id', '000001')->get();
});

Route::post('test', function(){
        $schema = new Schema([
        'query' => 'MensShopMainsModel'
    ]);
    
    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);
    $query = 'MensShopMainsModel';
    $variableValues = isset($input['variables']) ? $input['variables'] : null;
    
    try {
        $rootValue = ['prefix' => 'You said: '];
        $result = GraphQL::executeQuery($schema, $query, $rootValue, null, $variableValues);
        $output = $result->toArray();
    } catch (\Exception $e) {
        $output = [
            'errors' => [
                [
                    'message' => $e->getMessage()
                ]
            ]
        ];
    }
    header('Content-Type: application/json');
    return json_encode($output);
});