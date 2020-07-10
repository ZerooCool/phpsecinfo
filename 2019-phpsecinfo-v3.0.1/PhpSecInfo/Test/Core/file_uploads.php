<?php

declare(strict_types=1);

/**
 * Test Class for file_uploads
 *
 * @author Ed Finkler <coj@funkatron.com>
 */

/**
 * require the PhpSecInfo_Test_Core class
 */
//require_once('PhpSecInfo/Test/Test_Core.php');
require_once dirname(__DIR__) . '/Test_Core.php';

/**
 * Test Class for file_uploads
 */
class PhpSecInfo_Test_Core_File_Uploads extends PhpSecInfo_Test_Core
{
    /**
     * This should be a <b>unique</b>, human-readable identifier for this test
     *
     * @public string
     */

    public $test_name = 'file_uploads';

    public $recommended_value = false;

    public function _retrieveCurrentValue()
    {
        $this->current_value = $this->returnBytes(ini_get('file_uploads'));
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

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', 'file_uploads are disabled.  Unless you\'re sure you need them, this is the recommended setting');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'en', 'file_uploads are enabled.  If you do not require file upload capability, consider disabling them.');
    }
}
