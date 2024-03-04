<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Personnelmute
 * 
 * @property int $id
 * @property int $mutations_id
 * @property int $structureorigine
 * @property int $structuresaccueil
 * @property int $personnels_id
 * @property string|null $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Mutation $mutation
 * @property Personnel $personnel
 * @property Structure $structure
 *
 * @package App\Models
 */
class Personnelmute extends Model
{
	use SoftDeletes;
	protected $table = 'personnelmutes';

	protected $casts = [
		'mutations_id' => 'int',
		'structureorigine' => 'int',
		'structuresaccueil' => 'int',
		'personnels_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'mutations_id',
		'structureorigine',
		'structuresaccueil',
		'personnels_id',
		'libelle',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function mutation()
	{
		return $this->belongsTo(Mutation::class, 'mutations_id');
	}

	public function personnel()
	{
		return $this->belongsTo(Personnel::class, 'personnels_id');
	}

	public function structure()
	{
		return $this->belongsTo(Structure::class, 'structuresaccueil');
	}
}
