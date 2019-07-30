<?php
/**
 * Test class for is_self_write
 *
 * @package PhpSecInfo
 * @author Glenn S Crystal <glenn@gcosoftware.com>
 */

/**
 * require the PhpSecInfo_Test_Dir class
 */
require_once('PhpSecInfo/Test/Test_Dir.php');

/**
 * Test class for function is_self_write
 *
 * Checks if file permissions are proper for security.
 *
 *
 * @package PhpSecInfo
 * @author Glenn S Crystal <glenn@gcosoftware.com>
 */
class PhpSecInfo_Test_Dir_Is_Self_Write extends PhpSecInfo_Test_Dir
{

	/**
	 * This should be a <b>unique</b>, human-readable identifier for this test
	 *
	 * @public string
	 */
	public $test_name = "is_self_write";

	public $recommended_value = 'Read-Only';
	
	
	/**
	 * Return the current value for this Test
	 *
	 * @return
	 */
	function _retrieveCurrentValue() {
		// Get current permissions
		if (is_executable(__FILE__)) { $this->current_value = 'Execute+Write+Read'; }
		else if (is_writable(__FILE__)) { $this->current_value = 'Write+Read'; }
		else { $this->current_value = 'Read-Only'; }
	}


	/**
	 * Checks to see if the function is enabled
	 * @return integer
	 *
	 */
	function _execTest() {
		// Check permissions
		if ($this->current_value == 'Read-Only') { return PHPSECINFO_TEST_RESULT_OK; }
		else if ($this->current_value == 'Write+Read') { return PHPSECINFO_TEST_RESULT_NOTICE; }
		else { return PHPSECINFO_TEST_RESULT_WARN; }
	}



	/**
	 * Set the messages specific to this test
	 *
	 */
	function _setMessages() {
		parent::_setMessages();
		
		$this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', "Only allowing Read permission. This is the most secure setup.");
		$this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'en', "Execute permission enabled! You should never allow execution here.");
		$this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'en', 'Write permission enabled. You should consider revoking this permission since it can allow attackers to more easily modify files on your site.');

	}

}