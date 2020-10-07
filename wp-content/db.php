<?php
/**
 * A custom DB driver.
 *
 * @package DynoPress.
 */

/**
 * DynoPressDriver class.
 */
class DynoPressDriver extends wpdb {

	/**
	 * Default construct.
	 */
	public function __construct() {
		parent::__construct( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
	}
}

global $wpdb;
$wpdb = new DynoPressDriver();
