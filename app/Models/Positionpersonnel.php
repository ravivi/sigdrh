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
 * Class Positionpersonnel
 * 
 * @property int $id
 * @property int $emplois_id
 * @property int $typecontrats_id
 * @property int $fonctions_id
 * @property int $statuts_id
 * @property int $personnels_id
 * @property int $structures_id
 * @property string|null $libelle
 * @property Carbon|null $dateprisedeservice
 * @property int|null $heuredue
 * @property int|null $heureeffectuee
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property string|null $deleted_at
 * 
 * @property Emploi $emploi
 * @property Fonction $fonction
 * @property Personnel $personnel
 * @property Statut $statut
 * @property Structure $structure
 * @property Typecontrat $typecontrat
 * @property Collection|Matiere[] $matieres
 *
 * @package App\Models
 */
class Positionpersonnel extends Model
{
	use SoftDeletes;
	protected $table = 'positionpersonnels';

	protected $casts = [
		'emplois_id' => 'int',
		'typecontrats_id' => 'int',
		'fonctions_id' => 'int',
		'statuts_id' => 'int',
		'personnels_id' => 'int',
		'structures_id' => 'int',
		'dateprisedeservice' => 'datetime',
		'heuredue' => 'int',
		'heureeffectuee' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'emplois_id',
		'typecontrats_id',
		'fonctions_id',
		'statuts_id',
		'personnels_id',
		'structures_id',
		'libelle',
		'dateprisedeservice',
		'heuredue',
		'heureeffectuee',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function emploi()
	{
		return $this->belongsTo(Emploi::class, 'emplois_id');
	}

	public function fonction()
	{
		return $this->belongsTo(Fonction::class, 'fonctions_id');
	}

	public function personnel()
	{
		return $this->belongsTo(Personnel::class, 'personnels_id');
	}

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'statuts_id');
	}

	public function structure()
	{
		return $this->belongsTo(Structure::class, 'structures_id');
	}

	public function typecontrat()
	{
		return $this->belongsTo(Typecontrat::class, 'typecontrats_id');
	}

	public function matieres()
	{
		return $this->belongsToMany(Matiere::class, 'positionpersonnelmatiere', 'positionpersonnels_id', 'matieres_id')
					->withPivot('id', 'nbreheureeffectueparmatiere', 'deleted_at', 'created_by', 'updated_by', 'deleted_by')
					->withTimestamps();
	}
}
