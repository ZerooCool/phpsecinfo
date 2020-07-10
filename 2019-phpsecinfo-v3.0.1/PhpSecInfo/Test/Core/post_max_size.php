<?php

declare(strict_types=1);

/**
 * Test Class for post_max_size
 *
 * @author Ed Finkler <coj@funkatron.com>
 */

/**
 * Require the PhpSecInfo_Test_Core class
 */
//require_once('PhpSecInfo/Test/Test_Core.php');
require_once dirname(__DIR__) . '/Test_Core.php';

/**
 * The max recommended size for the post_max_size setting, in bytes (33554432)
 */
define('PHPSECINFO_POST_MAXLIMIT', 32 * 1024 * 1024);

/**
 * Test Class for post_max_size
 */
class PhpSecInfo_Test_Core_Post_Max_Size extends PhpSecInfo_Test_Core
{
    /**
     * This should be a <b>unique</b>, human-readable identifier for this test
     *
     * @public string
     */

    public $test_name = 'post_max_size';

    public $recommended_value = PHPSECINFO_POST_MAXLIMIT;

    public function _retrieveCurrentValue()
    {
        $this->current_value = $this->returnBytes(ini_get('post_max_size'));
    }

    /**
     * Check to see if the post_max_size setting is enabled.
     */
    public function _execTest()
    {
        if ($this->current_value
            && $this->current_value <= $this->recommended_value
            && -1 != $post_max_size) {
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

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', 'post_max_size is enabled, and appears to
				be a relatively low value');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'en', 'post_max_size is not enabled, or is set to
				a high value. Allowing a large value may open up your server to denial-of-service attacks');
    }
}
