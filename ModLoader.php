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

	public function __construct(Cache $cache, ModMapper $modMapper)
	{
		$this->cache = $cache;
		$this->modMapper = $modMapper;
	}

	public function get() {

		/**
		 * Load from cache
		 */
		$files = $this->cache->get($this->modMapper);

		/**
		 * Get latest version and the others
		 */
		$latest = $files[0];
		unset($files[0]);

		$others = array_values($files);

		return array("latest" => $latest, "others" => $others);
	}
}