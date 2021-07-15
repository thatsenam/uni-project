<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bills';

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
                  'bill_no',
                  'room_id',
                  'patient_id',
                  'doctor_charge',
                  'room_charge',
                  'total_charge',
                  'doctor_id',
                  'bill_by',
                  'date',
                  'notes'
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
     * Get the room for this model.
     *
     * @return App\Models\Room
     */
    public function room()
    {
        return $this->belongsTo('App\Models\Room','room_id');
    }

    /**
     * Get the patient for this model.
     *
     * @return App\Models\Patient
     */
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient','patient_id');
    }

    /**
     * Get the doctor for this model.
     *
     * @return App\Models\Doctor
     */
    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor','doctor_id');
    }

    /**
     * Get the billBy for this model.
     *
     * @return App\Models\BillBy
     */
    public function billBy()
    {
        return $this->belongsTo('App\Models\BillBy','bill_by');
    }



}
