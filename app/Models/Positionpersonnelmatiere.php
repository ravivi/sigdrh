<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Positionpersonnelmatiere
 * 
 * @property int $id
 * @property int|null $nbreheureeffectueparmatiere
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 *
 * @package App\Models
 */
class Positionpersonnelmatiere extends Model
{
	use SoftDeletes;
	protected $table = 'positionpersonnelmatieres';

	protected $casts = [
		'nbreheureeffectueparmatiere' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'nbreheureeffectueparmatiere',
		'created_by',
		'updated_by',
		'deleted_by'
	];
}
