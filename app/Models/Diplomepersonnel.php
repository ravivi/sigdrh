<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Diplomepersonnel
 * 
 * @property int $id
 * @property int $diplomes_id
 * @property int $personnels_id
 * @property Carbon|null $date
 * @property string|null $specialite
 * @property string|null $etablissement
 * @property int|null $pays_id
 * @property int|null $villes_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Diplome $diplome
 * @property Pay|null $pay
 * @property Personnel $personnel
 * @property Ville|null $ville
 *
 * @package App\Models
 */
class Diplomepersonnel extends Model
{
	use SoftDeletes;
	protected $table = 'diplomepersonnels';

	protected $casts = [
		'diplomes_id' => 'int',
		'personnels_id' => 'int',
		'date' => 'datetime',
		'pays_id' => 'int',
		'villes_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'diplomes_id',
		'personnels_id',
		'date',
		'specialite',
		'etablissement',
		'pays_id',
		'villes_id',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function diplome()
	{
		return $this->belongsTo(Diplome::class, 'diplomes_id');
	}

	public function pay()
	{
		return $this->belongsTo(Pay::class, 'pays_id');
	}

	public function personnel()
	{
		return $this->belongsTo(Personnel::class, 'personnels_id');
	}

	public function ville()
	{
		return $this->belongsTo(Ville::class, 'villes_id');
	}
}
