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
 * Class Structure
 * 
 * @property int $id
 * @property int $sousprefectures_id
 * @property int $dds_codeDd
 * @property string|null $codestructure
 * @property string|null $nomstructure
 * @property string|null $numcreation
 * @property Carbon|null $datecreation
 * @property string|null $numautorisation
 * @property string|null $situationgeo
 * @property string|null $adressePostale
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Dd $dd
 * @property Sousprefecture $sousprefecture
 * @property Collection|Demandeacte[] $demandeactes
 * @property Collection|Emploisanterieur[] $emploisanterieurs
 * @property Collection|Fonctionanterieur[] $fonctionanterieurs
 * @property Collection|Personnelaffecte[] $personnelaffectes
 * @property Collection|Personnelmute[] $personnelmutes
 * @property Collection|Positionpersonnel[] $positionpersonnels
 * @property Collection|Stage[] $stages
 *
 * @package App\Models
 */
class Structure extends Model
{
	use SoftDeletes;
	protected $table = 'structures';

	protected $casts = [
		'sousprefectures_id' => 'int',
		'dds_codeDd' => 'int',
		'datecreation' => 'datetime',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'sousprefectures_id',
		'dds_codeDd',
		'codestructure',
		'nomstructure',
		'numcreation',
		'datecreation',
		'numautorisation',
		'situationgeo',
		'adressePostale',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function dd()
	{
		return $this->belongsTo(Dd::class, 'dds_codeDd');
	}

	public function sousprefecture()
	{
		return $this->belongsTo(Sousprefecture::class, 'sousprefectures_id');
	}

	public function demandeactes()
	{
		return $this->hasMany(Demandeacte::class, 'structures_id');
	}

	public function emploisanterieurs()
	{
		return $this->hasMany(Emploisanterieur::class, 'structures_id');
	}

	public function fonctionanterieurs()
	{
		return $this->hasMany(Fonctionanterieur::class, 'structures_id');
	}

	public function personnelaffectes()
	{
		return $this->hasMany(Personnelaffecte::class, 'structures_id');
	}

	public function personnelmutes()
	{
		return $this->hasMany(Personnelmute::class, 'structuresaccueil');
	}

	public function positionpersonnels()
	{
		return $this->hasMany(Positionpersonnel::class, 'structures_id');
	}

	public function stages()
	{
		return $this->hasMany(Stage::class, 'structures_id');
	}
}
