<?php
/**
 * Model
 * 
 * @author: Michal Hojgr <michal.hojgr@gmail.com>
 * 
 */

require "ModMapper.php";

class Cache {
	const EXPIRATION_TIME = 3600;

	private $path;

	public function __construct() {
		$this->path = BASE_DIR . "/temp/cache/versions.json";
	}

	/**
	 * @return mixed
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * @param mixed $path
	 */
	public function setPath($path)
	{
		$this->path = $path;
	}


	public function get() {

		$mod_mapper = new ModMapper();

		if($this->hasExpired()) {
			/**
			 * get trough mapper
			 */
			$contents = $mod_mapper->get();

			file_put_contents($this->getPath(), json_encode($contents));

			/**
			 * In case of failure (file lock, permission deny, ...)
			 * it will just not cache and get the file every time
			 */
			return $contents;
		}

		/**
		 * get from cache
		 */
		return json_decode(file_get_contents($this->getPath()));
	}

	private function hasExpired()
	{
		$last_update = filemtime($this->getPath());
		if($last_update + self::EXPIRATION_TIME < time())
			return false;

		return true;
	}


}