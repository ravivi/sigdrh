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
 * Class Emploi
 * 
 * @property int $id
 * @property string|null $libelle
 * @property int $grades_id
 * @property int|null $quotahoraire
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property string|null $deleted_at
 * 
 * @property Grade $grade
 * @property Collection|Emploisanterieur[] $emploisanterieurs
 * @property Collection|Positionpersonnel[] $positionpersonnels
 *
 * @package App\Models
 */
class Emploi extends Model
{
	use SoftDeletes;
	protected $table = 'emplois';

	protected $casts = [
		'grades_id' => 'int',
		'quotahoraire' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'libelle',
		'grades_id',
		'quotahoraire',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function grade()
	{
		return $this->belongsTo(Grade::class, 'grades_id');
	}

	public function emploisanterieurs()
	{
		return $this->hasMany(Emploisanterieur::class, 'emplois_id');
	}

	public function positionpersonnels()
	{
		return $this->hasMany(Positionpersonnel::class, 'emplois_id');
	}
}
