<?php
namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Model\MensShopMains as MensShopMainsModel;

class MensShopMains extends Query
{
    protected $attributes = [
        'name'          => 'Mens Shop Mains Query',
        'description'   => 'Query of Mens Shop Mains',
    ];
    
    public function type()
    {
        return Type::listOf(GraphQL::type('MensShopMainsType'));
    }
    
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::string(),
            ],
            'shop_name' => [
                'name' => 'shop_name',
                'type' => Type::string(),
            ],
        ];
     }
        
    public function resolve($root, $args)
    {
        $searchModel = MensShopMainsModel::query();
        foreach ($args as $key =>$value)
        {
            if (isset($args[$key])) $searchModel->where($key, $value);
        }
        return $searchModel->get();
    
    }
}