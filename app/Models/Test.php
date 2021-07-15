<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tests';

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
                  'test_name',
                  'patient_id',
                  'doctor_id',
                  'bill_id',
                  'test_date',
                  'test_result'
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
     * Get the bill for this model.
     *
     * @return App\Models\Bill
     */
    public function bill()
    {
        return $this->belongsTo('App\Models\Bill','bill_id');
    }

    /**
     * Set the test_date.
     *
     * @param  string  $value
     * @return void
     */
    public function setTestDateAttribute($value)
    {
        $this->attributes['test_date'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    }

    /**
     * Get test_date in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getTestDateAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y');
    }

}
