<?php

namespace App\GraphQL\Type;

use App\Model\MensShopDetail;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MensShopDetailType extends GraphQLType
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
            'shop_table_id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'mens_shop_detail的id'
            ],
            'qualification_text' => [
                'type' => Type::string(),
                'description' => '商店說明'
            ],
            'avg_age' => [
                'type' => Type::string(),
                'description' => '商店要找的人的年齡'
            ],
        ];
    }
    
    // If you want to resolve the field yourself, you can declare a method
    // with the following format resolve[FIELD_NAME]Field()
    
}

