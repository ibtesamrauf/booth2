<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hotel';

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
 
 
    protected $fillable = ['name','country_id','description','image'];
    
    public function Country_name(){
        return $this->hasOne('App\Country' , 'id' , 'country_id');
    }

    public function Events(){
        return $this->hasOne('App\Event' , 'hotel_id' , 'id');
    }
    
    // public function HotspotInfo(){
    //     return $this->hasMany('App\Hot_spot_info');
    // }
}
