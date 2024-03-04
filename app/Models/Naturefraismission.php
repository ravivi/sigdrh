<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Naturefraismission
 * 
 * @property int $id
 * @property int|null $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Collection|Fraismission[] $fraismissions
 *
 * @package App\Models
 */
class Naturefraismission extends Model
{
	use SoftDeletes;
	protected $table = 'naturefraismission';

	protected $casts = [
		'libelle' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'libelle',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function fraismissions()
	{
		return $this->hasMany(Fraismission::class);
	}
}
