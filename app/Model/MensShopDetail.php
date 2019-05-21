<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MensShopDetail extends Model
{
    protected $table = 'mens_shop_details';
    
    public function shop_main()
    {
        return $this->hasOne(MensShopMains::class, 'id', 'shop_table_id');
    }
}
