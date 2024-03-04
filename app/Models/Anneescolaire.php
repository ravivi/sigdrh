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
 * Class Anneescolaire
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
 * @property Collection|Affectation[] $affectations
 * @property Collection|Atsn[] $atsns
 * @property Collection|Conge[] $conges
 * @property Collection|Demandeacte[] $demandeactes
 * @property Collection|Mission[] $missions
 * @property Collection|Mutation[] $mutations
 * @property Collection|Parametreglobaux[] $parametreglobauxes
 * @property Collection|Permission[] $permissions
 * @property Permutation $permutation
 *
 * @package App\Models
 */
class Anneescolaire extends Model
{
	use SoftDeletes;
	protected $table = 'anneescolaires';

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

	public function affectations()
	{
		return $this->hasMany(Affectation::class, 'anneescolaires_id');
	}

	public function atsns()
	{
		return $this->hasMany(Atsn::class, 'anneescolaires_id');
	}

	public function conges()
	{
		return $this->hasMany(Conge::class, 'anneescolaires_id');
	}

	public function demandeactes()
	{
		return $this->hasMany(Demandeacte::class, 'anneescolaires_id');
	}

	public function missions()
	{
		return $this->hasMany(Mission::class, 'anneescolaires_id');
	}

	public function mutations()
	{
		return $this->hasMany(Mutation::class, 'anneescolaires_id');
	}

	public function parametreglobauxes()
	{
		return $this->hasMany(Parametreglobaux::class, 'anneescolaires_id');
	}

	public function permissions()
	{
		return $this->hasMany(Permission::class, 'anneescolaires_id');
	}

	public function permutation()
	{
		return $this->hasOne(Permutation::class, 'anneescolaires_id');
	}
}
