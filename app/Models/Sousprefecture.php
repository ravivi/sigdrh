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
 * Class Sousprefecture
 * 
 * @property int $id
 * @property int $departements_id
 * @property string|null $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Departement $departement
 * @property Collection|Structure[] $structures
 *
 * @package App\Models
 */
class Sousprefecture extends Model
{
	use SoftDeletes;
	protected $table = 'sousprefectures';

	protected $casts = [
		'departements_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'departements_id',
		'libelle',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function departement()
	{
		return $this->belongsTo(Departement::class, 'departements_id');
	}

	public function structures()
	{
		return $this->hasMany(Structure::class, 'sousprefectures_id');
	}
}
