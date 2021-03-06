<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_history extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_history';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
 
 
    protected $fillable = ['first_name','last_name','email','phone_number','address','product_id'];
    
    public function products_details(){
        return $this->hasOne('App\Products' , 'id' , 'product_id');
    }
    
    // public function HotspotInfo(){
    //     return $this->hasMany('App\Hot_spot_info');
    // }
}
