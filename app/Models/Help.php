<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Help",
 *      required={type_helps_id, description, date, contributors_id, needy_id, place_delivery, date_hour},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="type_helps_id",
 *          description="type_helps_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="date",
 *          description="date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="contributors_id",
 *          description="contributors_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="needy_id",
 *          description="needy_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="place_delivery",
 *          description="place_delivery",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="delivered",
 *          description="delivered",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Help extends Model
{
    use SoftDeletes;

    public $table = 'helps';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'type_helps_id',
        'description',
        'date',
        'contributors_id',
        'needy_id',
        'place_delivery',
        'date_hour',
        'delivered'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'type_helps_id' => 'integer',
        'description' => 'string',
        'date' => 'date',
        'contributors_id' => 'integer',
        'needy_id' => 'integer',
        'place_delivery' => 'string',
        'date_hour' => 'datetime',
        'delivered' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];

    public function contributor() {
        return $this->belongsTo('App\Models\Contributor','contributors_id');
    }

    public function typehelp() {
        return $this->belongsTo('App\Models\Typehelp','type_helps_id');
    }

    public function needy() {
        return $this->belongsTo('App\Models\Needy','needy_id');
    }

}
