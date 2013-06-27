<?php
/**
 * Model
 * 
 * @author: Michal Hojgr <michal.hojgr@gmail.com>
 * 
 */

require "Cache.php";

class ModLoader {

	public function get() {

		/**
		 * Load from cache
		 */
		$cache = new Cache();
		$files = $cache->get();

		/**
		 * Get latest version and the others
		 */
		$latest = $files[0];
		unset($files[0]);

		$others = array_values($files);

		return array("latest" => $latest, "others" => $others);
	}
}