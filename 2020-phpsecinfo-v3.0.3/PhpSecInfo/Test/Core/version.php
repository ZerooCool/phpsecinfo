<?php
/**
 * Test class for PHP Version
 * Test from : https://github.com/bigdeej/PhpSecInfo/blob/master/PhpSecInfo/Test/Core/version.php
 *
 * @author Glenn S Crystal <glenn@gcosoftware.com>
 */

/**
 * Require the PhpSecInfo_Test_Curl class
 */
require_once ('PhpSecInfo/Test/Test_Core.php');

/**
 * Test class for PHP Version
 * Checks the current PHP Version against EOL Versions.
 *
 * @author Glenn S Crystal <glenn@gcosoftware.com>
 */
class PhpSecInfo_Test_Core_Version extends PhpSecInfo_Test_Core
{

    /**
     * This should be a <b>unique</b>, human-readable identifier for this test
     *
     * @public string
     */
    public $test_name = "version_number";

    // Cette ligne ne semble pas modifier l'affichage de la version recommandée.
    // Modifier le fichier .version.json en complément !
    // Modifier l'adresse URL ligne 69 permet de récupérer la version depuis le dépôt de Github du projet PhpSecInfo !
    public $recommended_value = '7.4.8';

    public $last_eol_value = '7.1';

    // Le message est commenté et implémenté au bas de page pour profiter du multilangue.
    // private $_message_ok = "You are running a current stable version of PHP!";

    public function _retrieveCurrentValue()
    {
        $this->current_value = PHP_VERSION;
        // $this->current_value = '5.4.15';
    }

    /**
     * Attempts to fetch from Github's server the latest versions of PHP
     * if CURL is not installed or we can not reach the server the latest
     * recommended value is returned instead.
     *
     * @public string
     */
    public function _retrieveCurrentVersions()
    {
        if (!function_exists('curl_init')) {
            // Le message est commenté et implémenté au bas de page pour profiter du multilangue.
            // Override the OK Message - Even if this passes we can't be 100% sure they are accurate since we didn't fetch the latest version
            // $this->_message_ok = "You are running a current stable version of PHP!
			//			<br /><strong>NOTE:</strong> CURL was unable to fetch the latest PHP Versions from the internet. This test may not be accurate if
			//			PhpSecInfo is not up to date.";

            return [
                'stable' => $this->recommended_value,
                'eol'    => $this->last_eol_value
            ];
        }

        // Attempt to fetch from server
        // Récupérer la version de PHP depuis le fichier .version.json
        $uri = 'https://raw.githubusercontent.com/ZerooCool/phpsecinfo/phpsecinfo-zeroocool-v3.0.3/2020-phpsecinfo-v3.0.3/.version.json';
        $ch  = curl_init();
        $timeout = 5;

        // CURL
        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        // Close CURL
        curl_close($ch);

        // Decode json
        $json = json_decode($data);

        // Detect CURL error and return local value
        if ($data === false || ! isset($json->stable) || !isset($json->eol)) {
            // Le message est commenté et implémenté au bas de page pour profiter du multilangue.
            // Override the OK Message - Even if this passes we can't be 100% sure they are accurate since we didn't fetch the latest version
            // $this->_message_ok = "You are running a current stable version of PHP!
			//			<br /><strong>NOTE:</strong> CURL was unable to fetch the latest PHP Versions from the internet. This test may not be accurate if
			//			PhpSecInfo is not up to date.";

            return [
                'stable' => $this->recommended_value,
                'eol'    => $this->last_eol_value
            ];
        }

        // to array
        $versions = [
            'stable' => $json->stable,
            'eol'    => $json->eol
        ];

        // Update local recommended value (it is used elsewhere and we don't want to modify that code just yet)
        // Mettre à jour la valeur recommandée locale (elle est utilisée ailleurs et nous ne voulons pas modifier ce code pour l'instant)
        $this->recommended_value = $json->stable;

        return $versions;
    }

    /**
     * Checks to see if the current PHP version is acceptable
     *
     * @return integer
     */
    public function _execTest()
    {
        // Get versions
        $version = $this->_retrieveCurrentVersions();

        if (version_compare($this->current_value, $version['stable'], '>=')) {
            return PHPSECINFO_TEST_RESULT_OK;
        } elseif (version_compare($this->current_value, $version['stable'], '<') && version_compare($this->current_value, $version['eol'], '>')) {
            return PHPSECINFO_TEST_RESULT_NOTICE;
        } else {
            return PHPSECINFO_TEST_RESULT_WARN;
        }
    }

    /**
     * Set the messages specific to this test
     */
    public function _setMessages()
    {
        parent::_setMessages();

        // Force to grab current versions - this will fetch the latest version.
        // Il me semble que cela ne fonctionne pas, et, que la version est uniquement récupérée via l'URL qui pointe vers le dépôt Github !
        // $this->_retrieveCurrentVersions();

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', 'You are running a current stable version of PHP!<br /><strong>NOTE:</strong> CURL was unable to fetch the latest PHP Versions from the internet. This test may not be accurate if PhpSecInfo is not up to date.');
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'en', "You are running a version of PHP that has reached End of Life for support.  You should upgrade to the latest version of PHP immediately.");
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'en', 'You are running a version of PHP that is not the most recent and may be near End of Life for support.  You should begin to migrate to the latest version of PHP as soon as possible.');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'fr', 'Vous utilisez la version courante stable de PHP.<br /><strong>NOTE:</strong> CURL was unable to fetch the latest PHP Versions from the internet. This test may not be accurate if PhpSecInfo is not up to date.');
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'fr', "Vous utilisez une version de PHP qui a atteint la fin de vie pour le support. You should upgrade to the latest version of PHP immediately.");
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'fr', 'Vous utilisez une version de PHP that is not the most recent and may be near End of Life for support.  You should begin to migrate to the latest version of PHP as soon as possible.');
        
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'ru', 'You are running a current stable version of PHP!<br /><strong>NOTE:</strong> CURL was unable to fetch the latest PHP Versions from the internet. This test may not be accurate if PhpSecInfo is not up to date.');
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'ru', "You are running a version of PHP that has reached End of Life for support.  You should upgrade to the latest version of PHP immediately.");
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'ru', 'You are running a version of PHP that is not the most recent and may be near End of Life for support.  You should begin to migrate to the latest version of PHP as soon as possible.');
        
    }
}
