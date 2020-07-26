<?php
/**
 * Test Class for allow_url_fopen
 *
 * @author Ed Finkler <coj@funkatron.com>
 */

/**
 * Require the PhpSecInfo_Test_Core class
 */
require_once ('PhpSecInfo/Test/Test_Core.php');

/**
 * Test Class for allow_url_fopen
 */
class PhpSecInfo_Test_Core_Allow_Url_Fopen extends PhpSecInfo_Test_Core
{

    /**
     * This should be a <b>unique</b>, human-readable identifier for this test
     *
     * @public string
     */
    public $test_name = "allow_url_fopen";

    /**
     * The recommended setting value
     *
     * @public mixed
     */
    public $recommended_value = false;

    public function _retrieveCurrentValue()
    {
        $this->current_value = $this->getBooleanIniValue('allow_url_fopen');
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
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', 'allow_url_fopen is disabled, which is the recommended setting');
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'en', 'allow_url_fopen is enabled.  This could be a serious security risk.  You should disable allow_url_fopen and consider using the <a href="https://php.net/manual/en/ref.curl.php" target="_blank">PHP cURL functions</a> instead.');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'fr', 'allow_url_fopen is disabled, which is the recommended setting');
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'fr', 'allow_url_fopen est activé. Cela pourrait constituer un risque sérieux pour la sécurité. Vous devez désactiver allow_url_fopen et envisager d\'utiliser les <a href="https://php.net/manual/en/ref.curl.php" target="_blank"> fonctions PHP cURL </a> à la place.');
       
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'ru', 'allow_url_fopen is disabled, which is the recommended setting');
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'ru', 'allow_url_fopen is enabled.  This could be a serious security risk.  You should disable allow_url_fopen and consider using the <a href="https://php.net/manual/en/ref.curl.php" target="_blank">PHP cURL functions</a> instead.');
        
    }
}
