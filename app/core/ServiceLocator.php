<?php
/**
 * Model
 * 
 * @author: Michal Hojgr <michal.hojgr@gmail.com>
 * 
 */

namespace app\core;

require BASE_DIR . "/app/cache/Cache.php";
require BASE_DIR . "/app/mapper/ModMapper.php";
require BASE_DIR . "/app/versioning/ModLoader.php";

use app\cache\Cache;
use app\mapper\ModMapper;
use app\versioning\ModLoader;

class ServiceLocator {
	private $cache;
	private $modLoader;
	private $modMapper;

	public function getCache() {
		if($this->cache === NULL)
			$this->cache = $this->createCache();

		return $this->cache;
	}

	public function getModLoader() {
		if($this->modLoader === NULL)
			$this->modLoader = $this->createModLoader();

		return $this->modLoader;
	}

	public function getModMapper() {
		if($this->modMapper === NULL)
			$this->modMapper = $this->createModMapper();

		return $this->modMapper;
	}

	public function createCache() {
		return new Cache($this->getModMapper());
	}

	public function createModLoader() {
		return new ModLoader($this->getCache(), $this->getModMapper());
	}

	public function createModMapper()
	{
		return new ModMapper();
	}
}