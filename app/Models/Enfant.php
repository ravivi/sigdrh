<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Enfant
 * 
 * @property int $id
 * @property int $personnels_id
 * @property string|null $nomdusecondparent
 * @property string|null $nom
 * @property string|null $prenoms
 * @property string|null $lieudenaissance
 * @property Carbon|null $datedenaissance
 * @property int $genre_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Genre $genre
 * @property Personnel $personnel
 *
 * @package App\Models
 */
class Enfant extends Model
{
	use SoftDeletes;
	protected $table = 'enfants';

	protected $casts = [
		'personnels_id' => 'int',
		'datedenaissance' => 'datetime',
		'genre_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'personnels_id',
		'nomdusecondparent',
		'nom',
		'prenoms',
		'lieudenaissance',
		'datedenaissance',
		'genre_id',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function genre()
	{
		return $this->belongsTo(Genre::class);
	}

	public function personnel()
	{
		return $this->belongsTo(Personnel::class, 'personnels_id');
	}
}
