<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $types
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 */
class Projects_types extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     *
     * @var string
     */
    protected $table = 'projects_types';
    /**
     * The "type" of the auto-incrementing ID.
     *
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['types', 'sort', 'created_at', 'updated_at'];

}
