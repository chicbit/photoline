<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Image
 *
 * @property integer $id
 * @property longText $token
 * @property string $date
 * @property string $path
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image whereToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image wherePath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image whereUpdatedAt($value)
 */
class Image extends Model
{
    protected $table = 'image';
    protected $fillable = ['id', 'token', 'path', 'date'];
}
