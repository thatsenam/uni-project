<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'appointments';

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
                  'doctor_id',
                  'patient_id',
                  'phone',
                  'appointment_date',
                  'charge',
                  'note'
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
     * Get the doctor for this model.
     *
     * @return App\Models\Doctor
     */
    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor','doctor_id');
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
     * Set the appointment_date.
     *
     * @param  string  $value
     * @return void
     */
    public function setAppointmentDateAttribute($value)
    {
        $this->attributes['appointment_date'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    }

    /**
     * Get appointment_date in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getAppointmentDateAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y');
    }

}
