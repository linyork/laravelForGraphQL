<?php

namespace App\GraphQL\Type;

use GraphQL;
use App\Model\MensShopMains;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MensShopMainsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'MensShopMainsType',
        'description' => 'MensShopMains model type',
        'model' => MensShopMains::class,
    ];
    
    /*
    * Uncomment following line to make the type input object.
    * http://graphql.org/learn/schema/#input-types
    */
    // protected $inputObject = true;
    
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the shop'
            ],
            'shop_name' => [
                'type' => Type::string(),
                'description' => 'The shop_name of id'
            ],
            'shop_detail' => [
                'type' => GraphQL::type('MensShopDetailType'),
                'description' => 'detail of shop',
            ]
        ];
    }
    
    // If you want to resolve the field yourself, you can declare a method
    // with the following format resolve[FIELD_NAME]Field()
}
