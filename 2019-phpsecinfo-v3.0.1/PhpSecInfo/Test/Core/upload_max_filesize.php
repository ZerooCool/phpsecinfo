<?php
/**
 * Test Class for upload_max_filesize
 *
 * @author Ed Finkler <coj@funkatron.com>
 */

/**
 * Require the PhpSecInfo_Test_Core class
 */
require_once('PhpSecInfo/Test/Test_Core.php');

/**
 * The max recommended size for the upload_max_filesize setting, in bytes (33554432)
 */
define('PHPSECINFO_UPLOAD_MAXLIMIT', 32*1024*1024);

/**
 * Test Class for upload_max_filesize
 */
class PhpSecInfo_Test_Core_Upload_Max_Filesize extends PhpSecInfo_Test_Core
{

    /**
     * This should be a <b>unique</b>, human-readable identifier for this test
     *
     * @public string
     */
    public $test_name         = "upload_max_filesize";
    public $recommended_value = PHPSECINFO_UPLOAD_MAXLIMIT;

    public function _retrieveCurrentValue()
    {
        $this->current_value = $this->returnBytes(ini_get('upload_max_filesize'));
    }

    /**
     * Check to see if the post_max_size setting is enabled.
     */
    public function _execTest()
    {
        if ($this->current_value && $this->current_value <= $this->recommended_value && $post_max_size != - 1) {
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

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', 'upload_max_filesize is enabled, and appears to be a relatively low value.');
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'en', 'upload_max_filesize is not enabled, or is set to a high value.  Are you sure your apps require uploading files of this size?  If not, lower the limit, as large file uploads can impact server performance');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'fr', 'upload_max_filesize est activé, and appears to be a relatively low value.');
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'fr', 'upload_max_filesize n\'est pas activé, or is set to a high value.  Are you sure your apps require uploading files of this size?  If not, lower the limit, as large file uploads can impact server performance');
        
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'ru', 'upload_max_filesize is enabled, and appears to be a relatively low value.');
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'ru', 'upload_max_filesize is not enabled, or is set to a high value.  Are you sure your apps require uploading files of this size?  If not, lower the limit, as large file uploads can impact server performance');
        
    }
}
