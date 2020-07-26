<?php
/**
 * Test Class for magic_quotes_gpc
 *
 * @author Ed Finkler <coj@funkatron.com>
 */

/**
 * Require the PhpSecInfo_Test_Core class
 */
require_once ('PhpSecInfo/Test/Test_Core.php');

/**
 * Test Class for magic_quotes_gpc
 */
class PhpSecInfo_Test_Core_Magic_Quotes_GPC extends PhpSecInfo_Test_Core
{

    /**
     * This should be a <b>unique</b>, human-readable identifier for this test
     *
     * @public string
     */
    public $test_name = "magic_quotes_gpc";

    public $recommended_value = false;

    public function _retrieveCurrentValue()
    {
        $this->current_value = $this->getBooleanIniValue('magic_quotes_gpc');
    }

    /**
     * magic_quotes_gpc has been removed since PHP 6.0
     *
     * @return boolean
     */
    public function isTestable()
    {
        return version_compare(PHP_VERSION, '6', '<');
    }

    /**
     * Checks to see if allow_url_fopen is enabled
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
        
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTRUN, 'en', 'You are running PHP 6 or later and magic_quotes_gpc has been removed');
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', 'magic_quotes_gpc is disabled, which is the recommended setting');
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'en', 'magic_quotes_gpc is enabled.  This
				feature is inconsistent in blocking attacks, and can in some cases cause data loss with
				uploaded files.  You should <i>not</i> rely on magic_quotes_gpc to block attacks.  It is
				recommended that magic_quotes_gpc be disabled, and input filtering be handled by your PHP
				scripts');
        
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTRUN, 'fr', 'Vous are running PHP 6 or later and magic_quotes_gpc has been removed');
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'fr', 'magic_quotes_gpc is disabled, which is the recommended setting');
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'fr', 'magic_quotes_gpc is enabled.  This
				feature is inconsistent in blocking attacks, and can in some cases cause data loss with
				uploaded files.  You should <i>not</i> rely on magic_quotes_gpc to block attacks.  It is
				recommended that magic_quotes_gpc be disabled, and input filtering be handled by your PHP
				scripts');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTRUN, 'ru', 'Vous are running PHP 6 or later and magic_quotes_gpc has been removed');
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'ru', 'magic_quotes_gpc is disabled, which is the recommended setting');
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'ru', 'magic_quotes_gpc is enabled.  This
				feature is inconsistent in blocking attacks, and can in some cases cause data loss with
				uploaded files.  You should <i>not</i> rely on magic_quotes_gpc to block attacks.  It is
				recommended that magic_quotes_gpc be disabled, and input filtering be handled by your PHP
				scripts');

    }
}
