<?php
/**
 * Class to validate and to work with IPv6 addresses
 *
 * @package Requests
 * @subpackage Utilities
 */

/**
 * Class to validate and to work with IPv6 addresses
 *
 * This was originally based on the PEAR class of the same name, but has been
 * entirely rewritten.
 *
 * @package Requests
 * @subpackage Utilities
 */
class Requests_IPv6 {
	/**
	 * Uncompresses an IPv6 address
	 *
	 * RFC 4291 allows you to compress consecutive zero pieces in an address to
	 * '::'. This method expects a valid IPv6 address and expands the '::' to
	 * the required number of zero pieces.
	 *
	 * Example:  FF01::101   ->  FF01:0:0:0:0:0:0:101
	 *           ::1         ->  0:0:0:0:0:0:0:1
	 *
	 * @author Alexander Merz <alexander.merz@web.de>
	 * @author elfrink at introweb dot nl
	 * @author Josh Peck <jmp at joshpeck dot org>
	 * @copyright 2003-2005 The PHP Group
	 * @license http://www.opensource.org/licenses/bsd-license.php
	 * @param string $ip An IPv6 address
	 * @return string The uncompressed IPv6 address
	 */
	public static function uncompress($ip) {
		if (substr_count($ip, '::') !== 1) {
			return $ip;
		}

		list($ip1, $ip2) = explode('::', $ip);
		$c1 = ($ip1 === '') ? -1 : substr_count($ip1, ':');
		$c2 = ($ip2 === '') ? -1 : substr_count($ip2, ':');

		if (strpos($ip2, '.') !== false) {
			$c2++;
		}
		// ::
		if ($c1 === -1 && $c2 === -1) {
			$ip = '0:0:0:0:0:0:0:0';
		}