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
 * Class Conge
 * 
 * @property int $id
 * @property int $typeconges_id
 * @property int $anneescolaires_id
 * @property string|null $numerodecisionconges
 * @property Carbon|null $datedebut
 * @property Carbon|null $datedereprise
 * @property string|null $lieujouissance
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Anneescolaire $anneescolaire
 * @property Typeconge $typeconge
 * @property Collection|Personnel[] $personnels
 *
 * @package App\Models
 */
class Conge extends Model
{
	use SoftDeletes;
	protected $table = 'conges';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'typeconges_id' => 'int',
		'anneescolaires_id' => 'int',
		'datedebut' => 'datetime',
		'datedereprise' => 'datetime',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'typeconges_id',
		'anneescolaires_id',
		'numerodecisionconges',
		'datedebut',
		'datedereprise',
		'lieujouissance',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function anneescolaire()
	{
		return $this->belongsTo(Anneescolaire::class, 'anneescolaires_id');
	}

	public function typeconge()
	{
		return $this->belongsTo(Typeconge::class, 'typeconges_id');
	}

	public function personnels()
	{
		return $this->belongsToMany(Personnel::class, 'personnelconges', 'conges_id', 'personnels_id')
					->withPivot('id', 'libelle', 'deleted_at', 'created_by', 'updated_by', 'deleted_by')
					->withTimestamps();
	}
}
