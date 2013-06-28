<?php
/**
 * Model
 * 
 * @author: Michal Hojgr <michal.hojgr@gmail.com>
 * 
 */

require "Cache.php";
require "ModMapper.php";
require "ModLoader.php";

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