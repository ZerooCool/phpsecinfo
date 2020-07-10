<?php

declare(strict_types=1);

/**
 * Test Class for upload_tmp_dir
 * @author Ed Finkler <coj@funkatron.com>
 */

/**
 * Require the PhpSecInfo_Test_Core class
 */
//require_once('PhpSecInfo/Test/Test_Core.php');
require_once dirname(__DIR__) . '/Test_Core.php';

/**
 * Test Class for upload_tmp_dir
 */
class PhpSecInfo_Test_Core_Upload_Tmp_Dir extends PhpSecInfo_Test_Core
{
    /**
     * This should be a <b>unique</b>, human-readable identifier for this test
     *
     * @public string
     */

    public $test_name = 'upload_tmp_dir';

    public $recommended_value = 'A non-world readable/writable directory';

    public function _retrieveCurrentValue()
    {
        $this->current_value = ini_get('upload_tmp_dir');

        if (empty($this->current_value)) {
            if (function_exists('sys_get_temp_dir')) {
                $this->current_value = sys_get_temp_dir();
            } else {
                $this->current_value = $this->sys_get_temp_dir();
            }
        }
    }

    /**
     * We are disabling this function on Windows OSes right now until
     * we can be certain of the proper way to check world-readability
     *
     * @return bool
     */
    public function isTestable()
    {
        if ($this->osIsWindows()) {
            return false;
        }

        return true;
    }

    /**
     * Check if upload_tmp_dir matches PHPSECINFO_TEST_COMMON_TMPDIR, or is
     * word-writable
     *
     * This is still unix-specific, and it's possible that for now
     * this test should be disabled under Windows builds.
     *
     * @see PHPSECINFO_TEST_COMMON_TMPDIR
     */
    public function _execTest()
    {
        $perms = @fileperms($this->current_value);

        if (false === $perms) {
            return PHPSECINFO_TEST_RESULT_WARN;
        }

        if ($this->current_value
            /* && !preg_match("|" . PHPSECINFO_TEST_COMMON_TMPDIR . "/?|", $this->current_value) */
            && !preg_match('%^' . PHPSECINFO_TEST_COMMON_TMPDIR . '(/|$)%', $this->current_value)
            && !($perms & 0x0004)
            && !($perms & 0x0002)) {
            return PHPSECINFO_TEST_RESULT_OK;
        }

        // Rewrite current_value to display perms
        $this->current_value .= ' (' . mb_substr(sprintf('%o', $perms), -4) . ')';

        return PHPSECINFO_TEST_RESULT_NOTICE;
    }

    /**
     * Set the messages specific to this test
     */
    public function _setMessages()
    {
        parent::_setMessages();

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTRUN, 'en', 'Test not run -- currently disabled on Windows OSes');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', 'upload_tmp_dir is enabled, which is the recommended setting.');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'en', 'Unable to retrieve file permissions on upload_tmp_dir');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'en', 'upload_tmp_dir is disabled, or you use the /tmp directory but
                                                this naming is not allowed for this test and you must provide a custom directory, or is set
                                                to a common world-writable directory (xx5). This typically allows other users on this server
                                                to access temporary copies of files uploaded via your PHP scripts. You should set
                                                upload_tmp_dir to a non-world-readable directory (7x0)');
    }
}
