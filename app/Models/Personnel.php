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
 * Class Personnel
 * 
 * @property int $id
 * @property int $civilite_id
 * @property int $nationalites_id
 * @property int $genre_id
 * @property int $etatmatrimonials_id
 * @property int $situationmilitaires_id
 * @property string|null $nom
 * @property string|null $prenoms
 * @property Carbon|null $datenaissance
 * @property string|null $lieunaissance
 * @property string|null $matricule
 * @property string|null $nompere
 * @property string|null $nommere
 * @property string|null $photo
 * @property string|null $email
 * @property string|null $adresse
 * @property string|null $image
 * @property int|null $nbreenfants
 * @property Carbon|null $datepremiereprisedeservice
 * @property string|null $natureactenominationemploi
 * @property string|null $numeroactenominationemploi
 * @property Carbon|null $dateactenominationemploi
 * @property string|null $natureactenominationfonction
 * @property string|null $numeroactenominationfonction
 * @property Carbon|null $dateactenominationfonction
 * @property string|null $telephonebureau
 * @property string|null $telephonedomicile
 * @property string|null $telephonecellulaire
 * @property string|null $nomdupere
 * @property string|null $nomdelamere
 * @property string|null $autrerenseigment
 * @property string|null $niveauword
 * @property string|null $niveauexcel
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * 
 * @property Civilite $civilite
 * @property Etatmatrimonial $etatmatrimonial
 * @property Genre $genre
 * @property Nationalite $nationalite
 * @property Situationmilitaire $situationmilitaire
 * @property Collection|Atsn[] $atsns
 * @property Collection|Contactdurgence[] $contactdurgences
 * @property Collection|Demandeacte[] $demandeactes
 * @property Collection|Diplome[] $diplomes
 * @property Collection|Emploisanterieur[] $emploisanterieurs
 * @property Collection|Enfant[] $enfants
 * @property Collection|Fonctionanterieur[] $fonctionanterieurs
 * @property Collection|Permission[] $permissions
 * @property Permutation $permutation
 * @property Collection|Personnelaffecte[] $personnelaffectes
 * @property Collection|Conge[] $conges
 * @property Collection|Matiere[] $matieres
 * @property Collection|Mission[] $missions
 * @property Collection|Personnelmute[] $personnelmutes
 * @property Collection|Positionpersonnel[] $positionpersonnels
 * @property Collection|Presence[] $presences
 * @property Collection|Stage[] $stages
 *
 * @package App\Models
 */
class Personnel extends Model
{
	use SoftDeletes;
	protected $table = 'personnels';

	protected $casts = [
		'civilite_id' => 'int',
		'nationalites_id' => 'int',
		'genre_id' => 'int',
		'etatmatrimonials_id' => 'int',
		'situationmilitaires_id' => 'int',
		'datenaissance' => 'datetime',
		'nbreenfants' => 'int',
		'datepremiereprisedeservice' => 'datetime',
		'dateactenominationemploi' => 'datetime',
		'dateactenominationfonction' => 'datetime',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'civilite_id',
		'nationalites_id',
		'genre_id',
		'etatmatrimonials_id',
		'situationmilitaires_id',
		'nom',
		'prenoms',
		'datenaissance',
		'lieunaissance',
		'matricule',
		'nompere',
		'nommere',
		'photo',
		'email',
		'adresse',
		'image',
		'nbreenfants',
		'datepremiereprisedeservice',
		'natureactenominationemploi',
		'numeroactenominationemploi',
		'dateactenominationemploi',
		'natureactenominationfonction',
		'numeroactenominationfonction',
		'dateactenominationfonction',
		'telephonebureau',
		'telephonedomicile',
		'telephonecellulaire',
		'nomdupere',
		'nomdelamere',
		'autrerenseigment',
		'niveauword',
		'niveauexcel',
		'created_by',
		'updated_by',
		'deleted_by'
	];

	public function civilite()
	{
		return $this->belongsTo(Civilite::class);
	}

	public function etatmatrimonial()
	{
		return $this->belongsTo(Etatmatrimonial::class, 'etatmatrimonials_id');
	}

	public function genre()
	{
		return $this->belongsTo(Genre::class);
	}

	public function nationalite()
	{
		return $this->belongsTo(Nationalite::class, 'nationalites_id');
	}

	public function situationmilitaire()
	{
		return $this->belongsTo(Situationmilitaire::class, 'situationmilitaires_id');
	}

	public function atsns()
	{
		return $this->hasMany(Atsn::class, 'personnels_id');
	}

	public function contactdurgences()
	{
		return $this->hasMany(Contactdurgence::class, 'personnels_id');
	}

	public function demandeactes()
	{
		return $this->hasMany(Demandeacte::class, 'personnels_id');
	}

	public function diplomes()
	{
		return $this->belongsToMany(Diplome::class, 'diplomepersonnels', 'personnels_id', 'diplomes_id')
					->withPivot('id', 'date', 'specialite', 'etablissement', 'pays_id', 'villes_id', 'deleted_at', 'created_by', 'updated_by', 'deleted_by')
					->withTimestamps();
	}

	public function emploisanterieurs()
	{
		return $this->hasMany(Emploisanterieur::class, 'personnels_id');
	}

	public function enfants()
	{
		return $this->hasMany(Enfant::class, 'personnels_id');
	}

	public function fonctionanterieurs()
	{
		return $this->hasMany(Fonctionanterieur::class, 'personnels_id');
	}

	public function permissions()
	{
		return $this->hasMany(Permission::class, 'personnels_id');
	}

	public function permutation()
	{
		return $this->hasOne(Permutation::class, 'personnels_id2');
	}

	public function personnelaffectes()
	{
		return $this->hasMany(Personnelaffecte::class, 'personnels_id');
	}

	public function conges()
	{
		return $this->belongsToMany(Conge::class, 'personnelconges', 'personnels_id', 'conges_id')
					->withPivot('id', 'libelle', 'deleted_at', 'created_by', 'updated_by', 'deleted_by')
					->withTimestamps();
	}

	public function matieres()
	{
		return $this->belongsToMany(Matiere::class, 'personnelmatieres', 'personnels_id', 'matieres_id')
					->withPivot('id', 'libelle', 'deleted_at', 'created_by', 'updated_by', 'deleted_by')
					->withTimestamps();
	}

	public function missions()
	{
		return $this->belongsToMany(Mission::class, 'personnelmissions', 'personnels_id', 'missions_id')
					->withPivot('id', 'libelle', 'deleted_at', 'created_by', 'updated_by', 'deleted_by')
					->withTimestamps();
	}

	public function personnelmutes()
	{
		return $this->hasMany(Personnelmute::class, 'personnels_id');
	}

	public function positionpersonnels()
	{
		return $this->hasMany(Positionpersonnel::class, 'personnels_id');
	}

	public function presences()
	{
		return $this->hasMany(Presence::class, 'personnels_id');
	}

	public function stages()
	{
		return $this->hasMany(Stage::class, 'personnels_id');
	}
}
