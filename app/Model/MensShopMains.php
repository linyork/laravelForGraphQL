<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MensShopMains extends Model
{
    protected $table = 'mens_shop_mains';
    
    public function shop_detail()
    {
        return $this->hasOne(MensShopDetail::class, 'shop_table_id', 'id');
    }
}
