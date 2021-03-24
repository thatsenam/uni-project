<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SMSModel extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 's_m_s_models';

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
                  'sms_template_id',
                  'sms_contact_id',
                  'is_all_supplier',
                  'is_all_customer',
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
     * Get the smsTemplate for this model.
     *
     * @return App\Models\SmsTemplate
     */
    public function smsTemplate()
    {
        return $this->belongsTo('App\Models\SmsTemplate','sms_template_id');
    }

    /**
     * Get the smsContact for this model.
     *
     * @return App\Models\SmsContact
     */
    public function smsContact()
    {
        return $this->belongsTo('App\Models\SmsContact','sms_contact_id');
    }



}
