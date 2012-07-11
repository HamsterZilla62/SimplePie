SimplePie Plugin pour CakePHP 2.x
=============

Informations
-------------------------------------------------------
Plugin permettant de manipuler des flux rss via CakePHP 2.X en utilisant la classe SimplePie.
Le présent plugin est basé sur le travail de Matt Curry qui avait développé le même plugin pour CakePHP 1.x (https://github.com/mcurry/simplepie)

Licence
-------------------------------------------------------
Cette oeuvre est mise à disposition sous licence Attribution - Pas d'Utilisation Commerciale - Partage dans les Mêmes Conditions 2.0 France. Pour voir une copie de cette licence, visitez http://creativecommons.org/licenses/by-nc-sa/2.0/fr/ ou écrivez à Creative Commons, 444 Castro Street, Suite 900, Mountain View, California, 94041, USA.

Installation
-------------------------------------------------------
Dézippez et le fichier et mettez le dans le dossier app/Plugin/Simplepie
Chargez le plugin en éditant le fichier app/Config/bootstrap.php en ajoutant la ligne suivante en fin de fichier
	CakePlugin::load('Simplepie',array('bootstrap'=>true));

Utilisation
-------------------------------------------------------
Dans les controllers où vous souhaitez utiliser ce plugin ajoutez la ligne ci-dessous au début de votre Controller
	public $components = array('Simplepie.Simplepie');

puis dans votre controller :
	$d['flux'] = $this->Simplepie->feed('URL_DU_FLUX_RSS'); 
	$this->set($d);
	
Dans la vue :
	debug($flux);