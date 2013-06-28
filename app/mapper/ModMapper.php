<?php
/**
 * Model
 * 
 * @author: Michal Hojgr <michal.hojgr@gmail.com>
 * 
 */

namespace app\mapper;

class ModMapper {
	/**
	 * Loads files from disk and reverses their order
	 * so it goes from highest to lowest
	 *
	 * @return array
	 */
	public function getVersionsFromDisk() {
		return array_reverse(glob(BASE_DIR . "/versions/*.txt"));
	}
}