<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Personnelconge
 * 
 * @property int $id
 * @property int $personnels_id
 * @property int $conges_id
 * @property string|null $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Conge $conge
 * @property Personnel $personnel
 *
 * @package App\Models
 */
class Personnelconge extends Model
{
	use SoftDeletes;
	protected $table = 'personnelconges';

	protected $casts = [
		'personnels_id' => 'int',
		'conges_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'personnels_id',
		'conges_id',
		'libelle',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function conge()
	{
		return $this->belongsTo(Conge::class, 'conges_id');
	}

	public function personnel()
	{
		return $this->belongsTo(Personnel::class, 'personnels_id');
	}
}
