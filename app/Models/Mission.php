<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Mission
 * 
 * @property int $id
 * @property int $anneescolaires_id
 * @property int $typemissions_id
 * @property string|null $numeromission
 * @property string|null $lieudemission
 * @property string|null $objetmission
 * @property string|null $moyentransport
 * @property Carbon|null $datedepart
 * @property Carbon|null $dateretour
 * @property string|null $imputationbudgetaire
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Anneescolaire $anneescolaire
 * @property Typemission $typemission
 * @property Collection|Fraismission[] $fraismissions
 * @property Collection|Personnel[] $personnels
 *
 * @package App\Models
 */
class Mission extends Model
{
	protected $table = 'missions';

	protected $casts = [
		'anneescolaires_id' => 'int',
		'typemissions_id' => 'int',
		'datedepart' => 'datetime',
		'dateretour' => 'datetime',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'anneescolaires_id',
		'typemissions_id',
		'numeromission',
		'lieudemission',
		'objetmission',
		'moyentransport',
		'datedepart',
		'dateretour',
		'imputationbudgetaire',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function anneescolaire()
	{
		return $this->belongsTo(Anneescolaire::class, 'anneescolaires_id');
	}

	public function typemission()
	{
		return $this->belongsTo(Typemission::class, 'typemissions_id');
	}

	public function fraismissions()
	{
		return $this->hasMany(Fraismission::class, 'missions_id');
	}

	public function personnels()
	{
		return $this->belongsToMany(Personnel::class, 'personnelmissions', 'missions_id', 'personnels_id')
					->withPivot('id', 'libelle', 'deleted_at', 'created_by', 'updated_by', 'deleted_by')
					->withTimestamps();
	}
}
