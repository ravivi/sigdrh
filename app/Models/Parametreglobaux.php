<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Parametreglobaux
 * 
 * @property int $id
 * @property int $anneescolaires_id
 * @property string|null $libelleannescolaire
 * @property Carbon|null $datedebutannescolaire
 * @property Carbon|null $datefinannescolaire
 * @property string|null $denominationministere
 * @property string|null $civiliteministre
 * @property string|null $denominationministre
 * @property string|null $nomministre
 * @property string|null $denominationrepublique
 * @property string|null $devise
 * @property string|null $logoministere
 * @property string|null $denominationdrh
 * @property string|null $fonctiondrh
 * @property string|null $civilitedrh
 * @property string|null $nomdrh
 * @property string|null $denominationdircab
 * @property string|null $civilitedircab
 * @property string|null $nomdircab
 * @property string|null $denominationdircabadjoint
 * @property string|null $civilitedircabadjoint
 * @property string|null $nomdircabadjoint
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Anneescolaire $anneescolaire
 *
 * @package App\Models
 */
class Parametreglobaux extends Model
{
	use SoftDeletes;
	protected $table = 'parametreglobaux';

	protected $casts = [
		'anneescolaires_id' => 'int',
		'datedebutannescolaire' => 'datetime',
		'datefinannescolaire' => 'datetime',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'anneescolaires_id',
		'libelleannescolaire',
		'datedebutannescolaire',
		'datefinannescolaire',
		'denominationministere',
		'civiliteministre',
		'denominationministre',
		'nomministre',
		'denominationrepublique',
		'devise',
		'logoministere',
		'denominationdrh',
		'fonctiondrh',
		'civilitedrh',
		'nomdrh',
		'denominationdircab',
		'civilitedircab',
		'nomdircab',
		'denominationdircabadjoint',
		'civilitedircabadjoint',
		'nomdircabadjoint',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function anneescolaire()
	{
		return $this->belongsTo(Anneescolaire::class, 'anneescolaires_id');
	}
}
