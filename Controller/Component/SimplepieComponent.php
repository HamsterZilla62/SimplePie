<?php
/**
 * Plugin permettant de manipuler des flux rss via CakePHP 2.X en utilisant la classe SimplePie.
 * Le présent plugin est basé sur le travail de Matt Curry qui avait développé le même plugin pour CakePHP 1.x (https://github.com/mcurry/simplepie)
 *
 * @author Maximilien Richard <maximilien.richard@gmail.com> www.maximilien-richard.com
 * @licence CreativeCommon CC BY-NC-SA <http://creativecommons.org/licenses/by-nc-sa/2.0/fr/>
 */
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class SimplepieComponent extends Component {
  private $cache;

  function __construct() {
    $this->cache = CACHE . 'rss' . DS;
  }

  function feed($feed_url, $options=array()) {
		$options = array_merge(array('start' => 0, 'length' => 10, 'cache' => true, 'fields' => array('title', 'permalink')), $options);
		
		if($options['cache']) {
			$items = Cache::read(md5($feed_url));
			if ($items !== false) {
				return $items;
			}
		}
    
    //make the cache dir if it doesn't exist
    if (!file_exists($this->cache)) {
      $folder = new Folder($this->cache, true);
    }

    //setup SimplePie
    $feed = new SimplePie();
    $feed->set_feed_url($feed_url);
    $feed->set_cache_location($this->cache);

    //retrieve the feed
    $feed->init();

    //get the feed items
    $items = $feed->get_items($options['start'], $options['length']);
		
		if($options['cache']) {
			$cache = array();
			foreach($items as $item) {
				$holder = array();
				foreach($options['fields'] as $field) {
					$holder[$field] = $item->{"get_$field"}();
				}
				$cache[] = $holder;
			}
			
			Cache::write(md5($feed_url), $cache);
			return $cache;
		}

    //return
    if ($items) {
      return $items;
    } else {
      return false;
    }
  }
}
?>
