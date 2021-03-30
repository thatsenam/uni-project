<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Person
 * @package App\Models
 * @version March 30, 2021, 6:11 am UTC
 *
 * @property string $name
 * @property int $age
 */
class Person extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'people';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'age'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'age' => 'required'
    ];

    
}
