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
 * Class Departement
 * 
 * @property int $id
 * @property int $regions_id
 * @property string|null $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Region $region
 * @property Collection|Sousprefecture[] $sousprefectures
 *
 * @package App\Models
 */
class Departement extends Model
{
	use SoftDeletes;
	protected $table = 'departements';

	protected $casts = [
		'regions_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'regions_id',
		'libelle',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function region()
	{
		return $this->belongsTo(Region::class, 'regions_id');
	}

	public function sousprefectures()
	{
		return $this->hasMany(Sousprefecture::class, 'departements_id');
	}
}
