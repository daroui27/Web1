<?php 
use Illuminate\Database\Eloquent\Model as Eloquent;
class Plats extends Eloquent {
	protected $table= 'plats';
	protected $id='id';
	protected $prenom='prenom';
	protected $nom='nom';
	protected $email='email';
	protected $titre='titre';
	protected $ingredient='ingredient';
	protected $recette='recette';
	public $timestamps = false;
}