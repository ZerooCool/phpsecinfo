<?php

declare(strict_types=1);

/**
 * Test class for CURL file_support
 *
 * @author Ed Finkler <coj@funkatron.com>
 */

/**
 * Require the PhpSecInfo_Test_Curl class
 */
//require_once('PhpSecInfo/Test/Test_Curl.php');
require_once dirname(__DIR__) . '/Test_Curl.php';

/**
 * Test class for CURL file_support
 *
 * Checks for CURL file:// support; if this is installed, it can be used to bypass
 * safe_mode and open_basedir
 *
 * @author Ed Finkler <coj@funkatron.com>
 */
class PhpSecInfo_Test_Curl_File_Support extends PhpSecInfo_Test_Curl
{
    /**
     * This should be a <b>unique</b>, human-readable identifier for this test
     *
     * @public string
     */

    public $test_name = 'file_support';

    public $recommended_value = '5.1.6+ or 4.4.4+';

    public function _retrieveCurrentValue()
    {
        $this->current_value = PHP_VERSION;
    }

    /**
     * Checks to see if libcurl's "file://" support is enabled by examining the "protocols" array
     * in the info returned from curl_version()
     * @return int
     */
    public function _execTest()
    {
        $curlinfo = curl_version();

        if (version_compare($this->current_value, '5.1.6', '>=')
            || (version_compare($this->current_value, '4.4.4', '>=')) && (version_compare($this->current_value, '5', '<'))) {
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

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en',
                                   'You are running PHP 4.4.4 or higher, or PHP 5.1.6 or higher.  These versions fix the security hole present in the cURL functions that allow it to bypass safe_mode and open_basedir restrictions.');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'en', 'A security hole present in your version of PHP allows the cURL functions to bypass safe_mode and open_basedir restrictions. You should upgrade to the latest version of PHP.');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'fr',
                                   'Vous utilisez PHP 4.4.4 ou supérieur, ou PHP 5.1.6 ou supérieur. Ces versions corrigent les failles de sécurité présentes dans les fonctions cURL qui lui permettent de contourner les restrictions safe_mode et open_basedir.');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'fr',
                                   'Une faille de sécurité présente dans votre version de PHP permet aux fonctions cURL de contourner les restrictions safe_mode et open_basedir. Vous devriez passer à la dernière version de PHP.');
    }
}
