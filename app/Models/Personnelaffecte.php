<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Personnelaffecte
 * 
 * @property int $id
 * @property int $affectations_id
 * @property int $personnels_id
 * @property int $structures_id
 * @property string|null $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Affectation $affectation
 * @property Personnel $personnel
 * @property Structure $structure
 *
 * @package App\Models
 */
class Personnelaffecte extends Model
{
	use SoftDeletes;
	protected $table = 'personnelaffectes';

	protected $casts = [
		'affectations_id' => 'int',
		'personnels_id' => 'int',
		'structures_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'affectations_id',
		'personnels_id',
		'structures_id',
		'libelle',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function affectation()
	{
		return $this->belongsTo(Affectation::class, 'affectations_id');
	}

	public function personnel()
	{
		return $this->belongsTo(Personnel::class, 'personnels_id');
	}

	public function structure()
	{
		return $this->belongsTo(Structure::class, 'structures_id');
	}
}
