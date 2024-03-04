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
 * Class Mutation
 * 
 * @property int $id
 * @property int $anneescolaires_id
 * @property string|null $numero
 * @property string|null $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Anneescolaire $anneescolaire
 * @property Collection|Personnelmute[] $personnelmutes
 *
 * @package App\Models
 */
class Mutation extends Model
{
	use SoftDeletes;
	protected $table = 'mutations';

	protected $casts = [
		'anneescolaires_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'anneescolaires_id',
		'numero',
		'libelle',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function anneescolaire()
	{
		return $this->belongsTo(Anneescolaire::class, 'anneescolaires_id');
	}

	public function personnelmutes()
	{
		return $this->hasMany(Personnelmute::class, 'mutations_id');
	}
}
