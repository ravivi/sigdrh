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
 * Class Acte
 * 
 * @property int $id
 * @property string|null $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Collection|Demandeacte[] $demandeactes
 *
 * @package App\Models
 */
class Acte extends Model
{
	use SoftDeletes;
	protected $table = 'actes';

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

	public function demandeactes()
	{
		return $this->hasMany(Demandeacte::class, 'actes_id');
	}
}
