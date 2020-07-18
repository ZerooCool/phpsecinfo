<?php

declare(strict_types=1);

/**
 * Test class for UID
 *
 * @author Ed Finkler <coj@funkatron.com>
 */

/**
 * Require the PhpSecInfo_Test_Core class
 */
//require_once('PhpSecInfo/Test/Test_Core.php');
require_once dirname(__DIR__) . '/Test_Core.php';

/**
 * the minimum "safe" UID that php should be executing as.  This can vary,
 * but in general 100 seems like a good min.
 */
define('PHPSECINFO_MIN_SAFE_UID', 100);

/**
 * Test class for UID
 */
class PhpSecInfo_Test_Core_Uid extends PhpSecInfo_Test_Core
{
    /**
     * This should be a <b>unique</b>, human-readable identifier for this test
     *
     * @public string
     */

    public $test_name = 'user_id';

    public $recommended_value = PHPSECINFO_MIN_SAFE_UID;

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
            $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTRUN, 'en', 'Functions required to retrieve user ID not available');

            return false;
        }

        return true;
    }

    public function _retrieveCurrentValue()
    {
        $id = $this->getUnixId();

        if (is_array($id)) {
            $this->current_value = $id['uid'];
        } else {
            $this->current_value = false;
        }
    }

    /**
     * Checks the GID of the PHP process to make sure it is above PHPSECINFO_MIN_SAFE_UID
     *
     * @see PHPSECINFO_MIN_SAFE_UID
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

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', 'PHP is executing as what is probably a non-privileged user');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'en', 'PHP may be executing as a "privileged" user, which could be a serious security vulnerability.');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTRUN, 'en', 'This test will not run on Windows OSes');
    }
}
