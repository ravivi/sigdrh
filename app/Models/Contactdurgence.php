<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contactdurgence
 * 
 * @property int $id
 * @property int $personnels_id
 * @property string|null $nom
 * @property string|null $prenoms
 * @property string|null $contact
 * @property string|null $liendeparente
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
class Contactdurgence extends Model
{
	use SoftDeletes;
	protected $table = 'contactdurgence';

	protected $casts = [
		'personnels_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'personnels_id',
		'nom',
		'prenoms',
		'contact',
		'liendeparente',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function personnel()
	{
		return $this->belongsTo(Personnel::class, 'personnels_id');
	}
}
