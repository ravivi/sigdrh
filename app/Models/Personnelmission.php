<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Personnelmission
 * 
 * @property int $id
 * @property int $missions_id
 * @property int $personnels_id
 * @property string|null $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Mission $mission
 * @property Personnel $personnel
 *
 * @package App\Models
 */
class Personnelmission extends Model
{
	use SoftDeletes;
	protected $table = 'personnelmissions';

	protected $casts = [
		'missions_id' => 'int',
		'personnels_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'missions_id',
		'personnels_id',
		'libelle',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function mission()
	{
		return $this->belongsTo(Mission::class, 'missions_id');
	}

	public function personnel()
	{
		return $this->belongsTo(Personnel::class, 'personnels_id');
	}
}
