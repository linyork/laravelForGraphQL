<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Model\MensShopDetail as MensShopDetailModel;

class MensShopDetailCount extends Query
{
    protected $attributes = ['name' => 'phpMensShopDetailCountQuery', 'description' => 'Query of Mens Shop Details ',];
    
    public function type()
    {
        return Type::listOf(GraphQL::type('MensShopDetailCountType'));
    }
    
    public function args()
    {
        return [
            'shop_table_id' => [
                'name' => 'shop_table_id',
                'type' => Type::string(),
                ],
            'qualification_text' => [
                'name' => 'qualification_text',
                'type' => Type::string()
            ],
            'avg_age' => [
                'name' => 'avg_age',
                'type' => Type::string(),
                ],
            ];
    }
    
    public function resolve($root, $args)
    {
        $searchModel = MensShopDetailModel::query();
        $searchModel->select('count(*) as count');
        foreach ( $args as $key => $value )
        {
            if ( isset($args[$key]) )
            {
                $searchModel->where($key, $value);
            }
        }
        return $searchModel->get();
    }
}
