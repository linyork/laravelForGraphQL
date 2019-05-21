<?php

namespace App\GraphQL\Type;

use App\Model\MensShopDetail;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MensShopDetailCountType extends GraphQLType
{
    protected $attributes = [
        'name' => 'MensShopDetailType',
        'description' => 'MensShopDetail model type',
        'model' => MensShopDetail::class,
    ];
    
    /*
    * Uncomment following line to make the type input object.
    * http://graphql.org/learn/schema/#input-types
    */
    // protected $inputObject = true;
    
    public function fields()
    {
        return [
            'count' => [
                'type' => Type::int(),
                'description' => '總數'
            ],
        ];
    }
    
    // If you want to resolve the field yourself, you can declare a method
    // with the following format resolve[FIELD_NAME]Field()
    
}

