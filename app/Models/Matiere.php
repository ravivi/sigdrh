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
 * Class Matiere
 * 
 * @property int $id
 * @property string|null $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Collection|Personnel[] $personnels
 * @property Collection|Positionpersonnel[] $positionpersonnels
 *
 * @package App\Models
 */
class Matiere extends Model
{
	use SoftDeletes;
	protected $table = 'matieres';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'libelle',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function personnels()
	{
		return $this->belongsToMany(Personnel::class, 'personnelmatieres', 'matieres_id', 'personnels_id')
					->withPivot('id', 'libelle', 'deleted_at', 'created_by', 'updated_by', 'deleted_by')
					->withTimestamps();
	}

	public function positionpersonnels()
	{
		return $this->belongsToMany(Positionpersonnel::class, 'positionpersonnelmatiere', 'matieres_id', 'positionpersonnels_id')
					->withPivot('id', 'nbreheureeffectueparmatiere', 'deleted_at', 'created_by', 'updated_by', 'deleted_by')
					->withTimestamps();
	}
}
