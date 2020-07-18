<?php

declare(strict_types=1);

/**
 * Test class for is_root_read
 *
 * @author Glenn S Crystal <glenn@gcosoftware.com>
 */

/**
 * Require the PhpSecInfo_Test_Dir class
 */
//require_once ('PhpSecInfo/Test/Test_Dir.php');
require_once dirname(__DIR__) . '/Test_Dir.php';

/**
 * Test class for function is_self_write
 * Checks if file permissions are proper for security.
 *
 * @author Glenn S Crystal <glenn@gcosoftware.com>
 */
class PhpSecInfo_Test_Dir_Is_Root_Read extends PhpSecInfo_Test_Dir
{
    /**
     * This should be a <b>unique</b>, human-readable identifier for this test
     *
     * @public string
     */

    public $test_name = 'is_root_read';

    public $recommended_value = 'None';

    /**
     * Return the current value for this Test
     */
    public function _retrieveCurrentValue()
    {
        // Get current permissions
        if (is_writable('/')) {
            $this->current_value = 'Write+Read';
        } elseif (is_readable('/')) {
            $this->current_value = 'Read-Only';
        } else {
            $this->current_value = 'None';
        }
    }

    /**
     * Checks to see if the function is enabled
     *
     * @return int
     */
    public function _execTest()
    {
        // Check permissions
        if ('None' == $this->current_value) {
            return PHPSECINFO_TEST_RESULT_OK;
        }

        if ('Read-Only' == $this->current_value) {
            return PHPSECINFO_TEST_RESULT_NOTICE;
        }

        return PHPSECINFO_TEST_RESULT_WARN;
    }

    /**
     * Set the messages specific to this test
     */
    public function _setMessages()
    {
        parent::_setMessages();

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', "No permissions granted for the root ('/') directory. This is the most secure setup.");

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'en', "Write permission enabled for the root ('/') directory! You should never allow writing outside your www base.");

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'en', "Read permission enabled. You should under normal instances never allow Reading of the root ('/').");
    }
}
