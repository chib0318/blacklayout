<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $projects_id
 * @property string $img
 * @property int $sort
 * @property string $title
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class Projects extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     ** @var string
     */
    protected $table = 'projects';

    /**
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['projects_id', 'img', 'sort', 'title', 'content', 'created_at', 'updated_at'];
    public function projects_types()
    {
        return $this->belongsTo('App\Projects_types','projects_id','id');
    }

}
