<?php
/**
 * Model
 * 
 * @author: Michal Hojgr <michal.hojgr@gmail.com>
 * 
 */

namespace app\cache;

use app\mapper\ModMapper;

class Cache {

	const EXPIRATION_TIME = 3600;

	/**
	 * Path to cache file
	 *
	 * @var string
	 */
	private $path;

	/**
	 * @var ModMapper
	 */
	private $modMapper;

	/**
	 * @param ModMapper $modMapper
	 */
	public function __construct(ModMapper $modMapper) {
		$this->path = BASE_DIR . "/temp/cache/versions.json";
		$this->modMapper = $modMapper;
	}

	/**
	 * @return string
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * @param string $path
	 */
	public function setPath($path)
	{
		$this->path = $path;
	}


	public function getCachedVersions() {

		if(!$this->cacheFileExists($this->getPath() || $this->hasExpired())) {
			$contents = $this->modMapper->getVersionsFromDisk();

			file_put_contents($this->getPath(), json_encode($contents));

			/**
			 * In case of failure (file lock, permission deny, ...)
			 * it will just not cache and get the file every time
			 */
			return $contents;
		}

		return json_decode(file_get_contents($this->getPath()));
	}

	private function hasExpired()
	{
		$last_update = filemtime($this->getPath());
		if($last_update + self::EXPIRATION_TIME < time())
			return false;

		return true;
	}

	private function cacheFileExists($file)
	{
		if(!file_exists($file))
			return false;

		return true;
	}


}