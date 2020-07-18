<?php

declare(strict_types=1);

/**
 * Test class for expose_php
 *
 * @author Ed Finkler <coj@funkatron.com>
 */

/**
 * Require the PhpSecInfo_Test_Core class
 */
//require_once('PhpSecInfo/Test/Test_Core.php');
require_once dirname(__DIR__) . '/Test_Core.php';

/**
 * Test class for expose_php
 */
class PhpSecInfo_Test_Core_Expose_Php extends PhpSecInfo_Test_Core
{
    /**
     * This should be a <b>unique</b>, human-readable identifier for this test
     *
     * @public string
     */

    public $test_name = 'expose_php';

    public $recommended_value = false;

    public function _retrieveCurrentValue()
    {
        $this->current_value = $this->returnBytes(ini_get('expose_php'));
    }

    /**
     * Checks to see if expose_php is enabled
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

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', 'expose_php is disabled, which is the recommended setting');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'en', 'expose_php is enabled.  This adds
				the PHP "signature" to the web server header, including the PHP version number.  This
				could attract attackers looking for vulnerable versions of PHP');
    }
}
