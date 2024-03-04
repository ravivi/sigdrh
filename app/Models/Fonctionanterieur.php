<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Fonctionanterieur
 * 
 * @property int $id
 * @property int $personnels_id
 * @property int $fonctions_id
 * @property int $structures_id
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
 * @property Fonction $fonction
 * @property Structure $structure
 * @property Personnel $personnel
 *
 * @package App\Models
 */
class Fonctionanterieur extends Model
{
	use SoftDeletes;
	protected $table = 'fonctionanterieurs';

	protected $casts = [
		'personnels_id' => 'int',
		'fonctions_id' => 'int',
		'structures_id' => 'int',
		'datedebut' => 'datetime',
		'datefin' => 'datetime',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'personnels_id',
		'fonctions_id',
		'structures_id',
		'datedebut',
		'datefin',
		'positionadministrative',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function fonction()
	{
		return $this->belongsTo(Fonction::class, 'fonctions_id');
	}

	public function structure()
	{
		return $this->belongsTo(Structure::class, 'structures_id');
	}

	public function personnel()
	{
		return $this->belongsTo(Personnel::class, 'personnels_id');
	}
}
