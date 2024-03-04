<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Personnelmatiere
 * 
 * @property int $id
 * @property int $personnels_id
 * @property int $matieres_id
 * @property string|null $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Matiere $matiere
 * @property Personnel $personnel
 *
 * @package App\Models
 */
class Personnelmatiere extends Model
{
	use SoftDeletes;
	protected $table = 'personnelmatieres';

	protected $casts = [
		'personnels_id' => 'int',
		'matieres_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'personnels_id',
		'matieres_id',
		'libelle',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function matiere()
	{
		return $this->belongsTo(Matiere::class, 'matieres_id');
	}

	public function personnel()
	{
		return $this->belongsTo(Personnel::class, 'personnels_id');
	}
}
