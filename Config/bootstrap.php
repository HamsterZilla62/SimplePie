<?php
/**
 * Plugin permettant de manipuler des flux rss via CakePHP 2.X en utilisant la classe SimplePie.
 * Le présent plugin est basé sur le travail de Matt Curry qui avait développé le même plugin pour CakePHP 1.x (https://github.com/mcurry/simplepie)
 *
 * @author Maximilien Richard <maximilien.richard@gmail.com> www.maximilien-richard.com
 * @licence CreativeCommon CC BY-NC-SA <http://creativecommons.org/licenses/by-nc-sa/2.0/fr/>
 */
//include the class if it doesn't exist
if (!class_exists('SimplePie')) {
    $file = dirname(dirname(__FILE__)) . DS . 'Lib' . DS . 'simplepie.php';
    if (file_exists($file)) {
        require_once($file);
    } else {
        die('SimplePie Class not found in ' . $file);
    }
}
?>
