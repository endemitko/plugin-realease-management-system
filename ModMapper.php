<?php
/**
 * Model
 * 
 * @author: Michal Hojgr <michal.hojgr@gmail.com>
 * 
 */


class ModMapper {
    public function get() {
		return array_reverse(glob(BASE_DIR . "/versions/*.txt"));
	}
}