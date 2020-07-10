<?php

declare(strict_types=1);

/**
 * Skeleton Test class file for ` group
 *
 * @author Ed Finkler <coj@funkatron.com>
 */

/**
 * Require the main PhpSecInfo class
 */
//require_once('PhpSecInfo/Test/Test.php');
require_once __DIR__ . '/Test.php';

/**
 * This is a skeleton class for PhpSecInfo "Curl" tests
 */
class PhpSecInfo_Test_Curl extends PhpSecInfo_Test
{
    /**
     * This value is used to group test results together.
     * For example, all tests related to the mysql lib should be grouped under "mysql."
     *
     * @public string
     */

    public $test_group = 'Curl';

    /**
     * "Curl" tests should only be run if the curl extension is installed.  We can check
     * for this by seeing if the function curl_init() is defined
     *
     * @return bool
     */
    public function isTestable()
    {
        /*      if ( function_exists('curl_init') ) {
                    return true;
                } else {
                    return false;
                }
        */

        return extension_loaded('curl');
    }

    /**
     * Set the messages for Curl tests
     */
    public function _setMessages()
    {
        parent::_setMessages();

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTRUN, 'en', 'CURL support is not enabled in your PHP install');
    }
}
