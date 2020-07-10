<?php

declare(strict_types=1);

/**
 * Test Class for register_globals
 *
 * @author Ed Finkler <coj@funkatron.com>
 */

/**
 * Require the PhpSecInfo_Test_Core class
 */
//require_once('PhpSecInfo/Test/Test_Core.php');
require_once dirname(__DIR__) . '/Test_Core.php';

/**
 * Test Class for register_globals
 */
class PhpSecInfo_Test_Core_Register_Globals extends PhpSecInfo_Test_Core
{
    /**
     * This should be a <b>unique</b>, human-readable identifier for this test
     *
     * @public string
     */

    public $test_name = 'register_globals';

    public $recommended_value = false;

    public function _retrieveCurrentValue()
    {
        $this->current_value = $this->getBooleanIniValue('register_globals');
    }

    /**
     * register_globals has been removed since PHP 6.0
     *
     * @return bool
     */
    public function isTestable()
    {
        return PHP_VERSION_ID < 60000;
    }

    /**
     * Checks to see if allow_url_fopen is enabled
     */
    public function _execTest()
    {
        if ($this->current_value == $this->recommended_value) {
            return PHPSECINFO_TEST_RESULT_OK;
        }

        return PHPSECINFO_TEST_RESULT_WARN;
    }

    /**
     * Set the messages specific to this test
     */
    public function _setMessages()
    {
        parent::_setMessages();

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTRUN, 'en', 'You are running PHP 6 or later and register_globals has been removed');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', 'register_globals is disabled, which is the recommended setting');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'en', 'register_globals is enabled.  This could be a serious security risk.  You should disable register_globals immediately');
    }
}
