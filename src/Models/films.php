<?php 
use Illuminate\Database\Eloquent\Model as Eloquent;
class films extends Eloquent {
	protected $ID = ['ID'];
	protected $Titre = ['Titre'];
	protected $Directeur = ['Directeur'];
	protected $Acteur = ['Acteur'];
	protected $Synopsis = ['Synopsis'];
	protected $Image_lien = ['Image_lien'];
	public $timestamps = false;
}