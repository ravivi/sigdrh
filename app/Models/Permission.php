<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Permission
 * 
 * @property int $id
 * @property int $personnels_id
 * @property int $anneescolaires_id
 * @property string|null $numeropermission
 * @property Carbon|null $datedebut
 * @property Carbon|null $datedereprise
 * @property string|null $motif
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
class Permission extends Model
{
	use SoftDeletes;
	protected $table = 'permissions';

	protected $casts = [
		'personnels_id' => 'int',
		'anneescolaires_id' => 'int',
		'datedebut' => 'datetime',
		'datedereprise' => 'datetime',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'personnels_id',
		'anneescolaires_id',
		'numeropermission',
		'datedebut',
		'datedereprise',
		'motif',
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
		return $this->belongsTo(Personnel::class, 'personnels_id');
	}
}
