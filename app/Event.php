<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // notes
    // status {1 for enable and 0 for disable}
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'event';

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
 
 
    protected $fillable = ['time', 'hotel_id', 'start_date', 'end_date'];
    
    public function one_hotel(){
        return $this->hasOne('App\Hotel' , 'id', 'hotel_id');
    }
    
    // public function HotspotInfo(){
    //     return $this->hasMany('App\Hot_spot_info');
    // }
}
