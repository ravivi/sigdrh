<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Procedurepiece
 * 
 * @property int $id
 * @property int $procedures_id
 * @property int $pieceafournirs_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Pieceafournir $pieceafournir
 * @property Procedure $procedure
 *
 * @package App\Models
 */
class Procedurepiece extends Model
{
	use SoftDeletes;
	protected $table = 'procedurepieces';

	protected $casts = [
		'procedures_id' => 'int',
		'pieceafournirs_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'procedures_id',
		'pieceafournirs_id',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function pieceafournir()
	{
		return $this->belongsTo(Pieceafournir::class, 'pieceafournirs_id');
	}

	public function procedure()
	{
		return $this->belongsTo(Procedure::class, 'procedures_id');
	}
}
