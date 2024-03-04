<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Diplome
 * 
 * @property int $id
 * @property string|null $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Collection|Personnel[] $personnels
 *
 * @package App\Models
 */
class Diplome extends Model
{
	protected $table = 'diplomes';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'libelle',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function personnels()
	{
		return $this->belongsToMany(Personnel::class, 'diplomepersonnels', 'diplomes_id', 'personnels_id')
					->withPivot('id', 'date', 'specialite', 'etablissement', 'pays_id', 'villes_id', 'deleted_at', 'created_by', 'updated_by', 'deleted_by')
					->withTimestamps();
	}
}
