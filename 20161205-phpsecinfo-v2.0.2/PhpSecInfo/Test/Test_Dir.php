<?php
/**
 * Skeleton Test class file for Dir group
 * 
 * @package PhpSecInfo
 * @author Glenn S Crystal <glenn@gcosoftware.com>
 */

/**
 * require the main PhpSecInfo class
 */
require_once('PhpSecInfo/Test/Test.php');



/**
 * This is a skeleton class for PhpSecInfo "Dir" tests
 * @package PhpSecInfo
 */
class PhpSecInfo_Test_Dir extends PhpSecInfo_Test
{
	
	/**
	 * This value is used to group test results together.
	 * 
	 * For example, all tests related to the mysql lib should be grouped under "mysql."
	 *
	 * @public string
	 */
	public $test_group = 'Dir';
	
	
	/**
	 * "Dir" tests should pretty much be always testable, so the default is just to return true
	 * 
	 * @return boolean
	 */
	function isTestable() {
		
		return true;
	}

	
}