<?php

declare(strict_types=1);

/**
 * Test class for GID
 * @author Ed Finkler <coj@funkatron.com>
 */

/**
 * Require the PhpSecInfo_Test_Core class
 */
//require_once('PhpSecInfo/Test/Test_Core.php');
require_once dirname(__DIR__) . '/Test_Core.php';

/**
 * the minimum "safe" UID that php should be executing as.
 * This can vary,
 * but in general 100 seems like a good min.
 */
define('PHPSECINFO_MIN_SAFE_GID', 100);

/**
 * Test class for GID
 */
class PhpSecInfo_Test_Core_Gid extends PhpSecInfo_Test_Core
{
    /**
     * This should be a <b>unique</b>, human-readable identifier for this test
     *
     * @public string
     */

    public $test_name = 'group_id';

    public $recommended_value = PHPSECINFO_MIN_SAFE_GID;

    /**
     * This test only works under Unix OSes
     *
     * @return bool
     */
    public function isTestable()
    {
        if ($this->osIsWindows()) {
            return false;
        }

        if (false === $this->getUnixId()) {
            $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTRUN, 'en', 'Functions required to retrieve group ID not available');

            return false;
        }

        return true;
    }

    public function _retrieveCurrentValue()
    {
        $id = $this->getUnixId();

        if (is_array($id)) {
            $lowest_gid = key($id['groups']);

            $this->current_value = $lowest_gid;
        } else {
            $this->current_value = false;
        }
    }

    /**
     * Checks the GID of the PHP process to make sure it is above PHPSECINFO_MIN_SAFE_GID
     *
     * @see PHPSECINFO_MIN_SAFE_GID
     */
    public function _execTest()
    {
        if ($this->current_value >= $this->recommended_value) {
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

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', 'PHP is executing as what is probably a non-privileged group');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'en', 'PHP may be executing as a "privileged" group, which could be a serious security vulnerability.');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTRUN, 'en', 'This test will not run on Windows OSes');
    }
}
