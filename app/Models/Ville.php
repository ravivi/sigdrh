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
 * Class Ville
 * 
 * @property int $id
 * @property string|null $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property int $pays_id
 * 
 * @property Pay $pay
 * @property Collection|Diplomepersonnel[] $diplomepersonnels
 *
 * @package App\Models
 */
class Ville extends Model
{
	use SoftDeletes;
	protected $table = 'villes';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int',
		'pays_id' => 'int'
	];

	protected $fillable = [
		'libelle',
		'created_by',
		'updated_by',
		'deleted_by',
		'pays_id'
	];

	public function pay()
	{
		return $this->belongsTo(Pay::class, 'pays_id');
	}

	public function diplomepersonnels()
	{
		return $this->hasMany(Diplomepersonnel::class, 'villes_id');
	}
}
