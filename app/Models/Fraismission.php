<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Fraismission
 * 
 * @property int $id
 * @property int $missions_id
 * @property int $naturefraismission_id
 * @property int|null $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Mission $mission
 * @property Naturefraismission $naturefraismission
 *
 * @package App\Models
 */
class Fraismission extends Model
{
	use SoftDeletes;
	protected $table = 'fraismission';

	protected $casts = [
		'missions_id' => 'int',
		'naturefraismission_id' => 'int',
		'libelle' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'missions_id',
		'naturefraismission_id',
		'libelle',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function mission()
	{
		return $this->belongsTo(Mission::class, 'missions_id');
	}

	public function naturefraismission()
	{
		return $this->belongsTo(Naturefraismission::class);
	}
}
