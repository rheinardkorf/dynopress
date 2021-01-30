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
	public function __construct( $u, $p, $db, $host ) {
		parent::__construct( $u, $p, $db, $host );
		// parent::__construct( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
	}

	/**
	 * Everything hinges here!
	 *
	 * @param string $query DB query.
	 * @return void
	 */
	public function query( $query ) {
		// die( $query );
		if ( "SELECT option_name, option_value FROM wp_options WHERE autoload = 'yes'" === $query ) {
			$this->last_result = $this->fake_options();
			$this->num_rows    = 116;
			return 116;
		}
		$result = parent::query( $query );
		return $result;
	}

	private function fake_options() {
		return;
	}
}

global $wpdb;
$wpdb = new DynoPressDriver( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
