<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Stage
 * 
 * @property int $id
 * @property int $personnels_id
 * @property int $structures_id
 * @property string|null $intitule
 * @property Carbon|null $date
 * @property int|null $duree
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Personnel $personnel
 * @property Structure $structure
 *
 * @package App\Models
 */
class Stage extends Model
{
	use SoftDeletes;
	protected $table = 'stages';

	protected $casts = [
		'personnels_id' => 'int',
		'structures_id' => 'int',
		'date' => 'datetime',
		'duree' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'personnels_id',
		'structures_id',
		'intitule',
		'date',
		'duree',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function personnel()
	{
		return $this->belongsTo(Personnel::class, 'personnels_id');
	}

	public function structure()
	{
		return $this->belongsTo(Structure::class, 'structures_id');
	}
}
