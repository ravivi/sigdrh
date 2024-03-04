<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Emploisanterieur
 * 
 * @property int $id
 * @property int $personnels_id
 * @property int $structures_id
 * @property int $emplois_id
 * @property Carbon|null $datedebut
 * @property Carbon|null $datefin
 * @property string|null $positionadministrative
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Emploi $emploi
 * @property Personnel $personnel
 * @property Structure $structure
 *
 * @package App\Models
 */
class Emploisanterieur extends Model
{
	use SoftDeletes;
	protected $table = 'emploisanterieurs';

	protected $casts = [
		'personnels_id' => 'int',
		'structures_id' => 'int',
		'emplois_id' => 'int',
		'datedebut' => 'datetime',
		'datefin' => 'datetime',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'personnels_id',
		'structures_id',
		'emplois_id',
		'datedebut',
		'datefin',
		'positionadministrative',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function emploi()
	{
		return $this->belongsTo(Emploi::class, 'emplois_id');
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
