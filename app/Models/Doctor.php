<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'doctors';

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
    protected $fillable = [
                  'name',
                  'age',
                  'gender',
                  'phone',
                  'email',
                  'password',
                  'fee',
                  'specialize_id',
                  'address',
                  'file'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the specialize for this model.
     *
     * @return App\Models\Specialize
     */
    public function specialize()
    {
        return $this->belongsTo('App\Models\Specialize','specialize_id');
    }



}
