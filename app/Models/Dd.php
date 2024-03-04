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
 * Class Dd
 * 
 * @property int $id
 * @property int $drs_id
 * @property string|null $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Dr $dr
 * @property Collection|Structure[] $structures
 *
 * @package App\Models
 */
class Dd extends Model
{
	use SoftDeletes;
	protected $table = 'dds';

	protected $casts = [
		'drs_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'drs_id',
		'libelle',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function dr()
	{
		return $this->belongsTo(Dr::class, 'drs_id');
	}

	public function structures()
	{
		return $this->hasMany(Structure::class, 'dds_codeDd');
	}
}
