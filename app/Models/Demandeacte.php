<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Demandeacte
 * 
 * @property int $id
 * @property int $structures_id
 * @property int $personnels_id
 * @property string|null $numero
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property int $actes_id
 * @property int $anneescolaires_id
 * 
 * @property Acte $acte
 * @property Anneescolaire $anneescolaire
 * @property Personnel $personnel
 * @property Structure $structure
 *
 * @package App\Models
 */
class Demandeacte extends Model
{
	use SoftDeletes;
	protected $table = 'demandeactes';

	protected $casts = [
		'structures_id' => 'int',
		'personnels_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int',
		'actes_id' => 'int',
		'anneescolaires_id' => 'int'
	];

	protected $fillable = [
		'structures_id',
		'personnels_id',
		'numero',
		'created_by',
		'updated_by',
		'deleted_by',
		'actes_id',
		'anneescolaires_id'
	];

	public function acte()
	{
		return $this->belongsTo(Acte::class, 'actes_id');
	}

	public function anneescolaire()
	{
		return $this->belongsTo(Anneescolaire::class, 'anneescolaires_id');
	}

	public function personnel()
	{
		return $this->belongsTo(Personnel::class, 'personnels_id');
	}

	public function structure()
	{
		return $this->belongsTo(Structure::class, 'structures_id');
	}
}
