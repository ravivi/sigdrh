<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Presence
 * 
 * @property int $id
 * @property int $personnels_id
 * @property int|null $statutpresence
 * @property Carbon $date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Personnel $personnel
 *
 * @package App\Models
 */
class Presence extends Model
{
	use SoftDeletes;
	protected $table = 'presences';

	protected $casts = [
		'personnels_id' => 'int',
		'statutpresence' => 'int',
		'date' => 'datetime',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'personnels_id',
		'statutpresence',
		'date',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function personnel()
	{
		return $this->belongsTo(Personnel::class, 'personnels_id');
	}
}
