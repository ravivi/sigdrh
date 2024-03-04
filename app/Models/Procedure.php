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
 * Class Procedure
 * 
 * @property int $id
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property int $etapes_id
 * 
 * @property Etape $etape
 * @property Collection|Procedurepiece[] $procedurepieces
 *
 * @package App\Models
 */
class Procedure extends Model
{
	use SoftDeletes;
	protected $table = 'procedures';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int',
		'etapes_id' => 'int'
	];

	protected $fillable = [
		'description',
		'created_by',
		'updated_by',
		'deleted_by',
		'etapes_id'
	];

	public function etape()
	{
		return $this->belongsTo(Etape::class, 'etapes_id');
	}

	public function procedurepieces()
	{
		return $this->hasMany(Procedurepiece::class, 'procedures_id');
	}
}
