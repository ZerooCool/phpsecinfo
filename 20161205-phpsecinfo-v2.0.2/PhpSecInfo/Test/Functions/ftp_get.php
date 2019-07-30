<?php
/**
 * Test class for ftp_get
 *
 * @package PhpSecInfo
 * @author Glenn S Crystal <glenn@gcosoftware.com>
 */

/**
 * require the PhpSecInfo_Test_Functions class
 */
require_once('PhpSecInfo/Test/Test_Functions.php');

/**
 * Test class for function ftp_get
 *
 * Checks if dangerous functionality is enabled.
 *
 *
 * @package PhpSecInfo
 * @author Glenn S Crystal <glenn@gcosoftware.com>
 */
class PhpSecInfo_Test_Functions_Ftp_Get extends PhpSecInfo_Test_Functions
{

	/**
	 * This should be a <b>unique</b>, human-readable identifier for this test
	 *
	 * @public string
	 */
	public $test_name = "ftp_get";

	public $recommended_value = 'Disabled';
	
	
	/**
	 * Return the current value for this Test
	 *
	 * @return
	 */
	function _retrieveCurrentValue() {
		if (function_exists($this->test_name)) { $this->current_value = 'Enabled'; }
		else { $this->current_value = 'Disabled'; }
	}


	/**
	 * Checks to see if the function is enabled
	 * @return integer
	 *
	 */
	function _execTest() {
		// Check if function exists
		if (function_exists($this->test_name)) {
			return PHPSECINFO_TEST_RESULT_WARN;
		} else {
			return PHPSECINFO_TEST_RESULT_OK;
		}
	}



	/**
	 * Set the messages specific to this test
	 *
	 */
	function _setMessages() {
		parent::_setMessages();
		
		$this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', "You have this function listed in your php.ini under disabled_functions.");
		$this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'en', "This function is not in your php.ini disabled_functions and is enabled.  This function can cause serious security implications, unless you absolutely need this function you should add it to your disabled_functions.");
		$this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'en', 'This function is not in your php.ini disabled_functions and is enabled.  Use caution with this function and if you do not need it explicitly add it to your disabled_functions.');

	}

}
