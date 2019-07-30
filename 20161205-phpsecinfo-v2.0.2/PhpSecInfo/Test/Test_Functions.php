<?php
/**
 * Skeleton Test class file for Core group
 * 
 * @package PhpSecInfo
 * @author Glenn S Crystal <glenn@gcosoftware.com>
 */

/**
 * require the main PhpSecInfo class
 */
require_once('PhpSecInfo/Test/Test.php');



/**
 * This is a skeleton class for PhpSecInfo "Functions" tests
 * @package PhpSecInfo
 */
class PhpSecInfo_Test_Functions extends PhpSecInfo_Test
{
	
	/**
	 * This value is used to group test results together.
	 * 
	 * For example, all tests related to the mysql lib should be grouped under "mysql."
	 *
	 * @public string
	 */
	public $test_group = 'Functions';
	
	
	/**
	 * "Functions" tests should pretty much be always testable, so the default is just to return true
	 * 
	 * @return boolean
	 */
	function isTestable() {
		
		return true;
	}

	
}