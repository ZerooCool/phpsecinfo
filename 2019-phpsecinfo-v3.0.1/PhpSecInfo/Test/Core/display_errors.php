<?php

declare(strict_types=1);

/**
 * Test class for display_errors
 *
 * @author Ed Finkler <coj@funkatron.com>
 */

/**
 * Require the PhpSecInfo_Test_Core class
 */
//require_once('PhpSecInfo/Test/Test_Core.php');
require_once dirname(__DIR__) . '/Test_Core.php';

/**
 * Test class for display_errors
 */
class PhpSecInfo_Test_Core_Display_Errors extends PhpSecInfo_Test_Core
{
    /**
     * This should be a <b>unique</b>, human-readable identifier for this test
     *
     * @public string
     */

    public $test_name = 'display_errors';

    public $recommended_value = false;

    public function _retrieveCurrentValue()
    {
        $this->current_value = $this->getBooleanIniValue('display_errors');
    }

    /**
     * Checks to see if display_errors is enabled
     */
    public function _execTest()
    {
        if ($this->current_value == $this->recommended_value) {
            return PHPSECINFO_TEST_RESULT_OK;
        }

        return PHPSECINFO_TEST_RESULT_NOTICE;
    }

    /**
     * Set the messages specific to this test
     */
    public function _setMessages()
    {
        parent::_setMessages();

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', 'display_errors is disabled, which is the recommended setting');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'en', 'display_errors is enabled.  This is not recommended on "production" servers, as it could reveal sensitive information.  You should consider disabling this feature');
    }
}
