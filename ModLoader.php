<?php
/**
 * Model
 * 
 * @author: Michal Hojgr <michal.hojgr@gmail.com>
 * 
 */

class ModLoader {

	/**
	 * @var Cache
	 */
	private $cache;
	/**
	 * @var ModMapper
	 */
	private $modMapper;

	/**
	 * @param Cache $cache
	 * @param ModMapper $modMapper
	 */
	public function __construct(Cache $cache, ModMapper $modMapper)
	{
		$this->cache = $cache;
		$this->modMapper = $modMapper;
	}

	/**
	 * Loads all versions, caches them and in case that
	 * cache was made recently, it reads from cache
	 *
	 * @param int $count how many versions to show
	 * @param int $start
	 * @return array
	 */
	public function getVersions($count, $start = 0) {

		/**
		 * Load from cache
		 */
		$files = $this->cache->getCachedVersions($this->modMapper);

		/**
		 * Get latest version and the others
		 */
		$latest = $files[0];
		unset($files[0]);

		$others = array_values($files);

		// buffer count so it must not count every loop
		$buffer_count = count($others);

		for($i = 0; $i < $count; $i++) {
			if($i < $start || $i > $start + $buffer_count)
				unset($others[$i]);
		}

		return array("latest" => $latest, "others" => $others);
	}
}