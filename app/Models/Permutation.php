<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Permutation
 * 
 * @property int $id
 * @property int $anneescolaires_id
 * @property int $personnels_id1
 * @property int $personnels_id2
 * @property string|null $code
 * @property string|null $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Anneescolaire $anneescolaire
 * @property Personnel $personnel
 *
 * @package App\Models
 */
class Permutation extends Model
{
	use SoftDeletes;
	protected $table = 'permutations';

	protected $casts = [
		'anneescolaires_id' => 'int',
		'personnels_id1' => 'int',
		'personnels_id2' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'anneescolaires_id',
		'personnels_id1',
		'personnels_id2',
		'code',
		'libelle',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function anneescolaire()
	{
		return $this->belongsTo(Anneescolaire::class, 'anneescolaires_id');
	}

	public function personnel()
	{
		return $this->belongsTo(Personnel::class, 'personnels_id2');
	}
}
