<?php

declare(strict_types=1);

/**
 * Skeleton Test class file
 *
 * @author Ed Finkler <coj@funkatron.com>
 */

/**
 * Require the main PhpSecInfo class
 */
//require_once ('PhpSecInfo/PhpSecInfo.php');
require_once dirname(__DIR__) . '/PhpSecInfo.php';

define('PHPSECINFO_TEST_RESULT_OK', -1);
define('PHPSECINFO_TEST_RESULT_NOTICE', -2);
define('PHPSECINFO_TEST_RESULT_WARN', -4);
define('PHPSECINFO_TEST_RESULT_ERROR', -1024);
define('PHPSECINFO_TEST_RESULT_NOTRUN', -2048);
define('PHPSECINFO_TEST_COMMON_TMPDIR', '/tmp');
define('PHPSECINFO_TEST_MOREINFO_BASEURL', 'http://phpsec.org/projects/phpsecinfo/tests/');

/**
 * This is a skeleton class for PhpSecInfo tests You should extend this to make a "group" skeleton
 * to categorize tests under, then make a subdir with your group name that contains test classes
 * extending your group skeleton class.
 */
class PhpSecInfo_Test
{
    /**
     * This value is used to group test results together.
     * For example, all tests related to the mysql lib should be grouped under "mysql."
     *
     * @public string
     */

    public $test_group = 'misc';

    /**
     * This should be a <b>unique</b>, human-readable identifier for this test
     *
     * @public string
     */

    public $test_name = 'misc_test';

    /**
     * This is the recommended value the test will be looking for
     *
     * @public mixed
     */

    public $recommended_value = 'bar';

    /**
     * The result returned from the test
     *
     * @public integer
     */

    public $_result = PHPSECINFO_TEST_RESULT_NOTRUN;

    /**
     * The message corresponding to the result of the test
     *
     * @public string
     */

    public $_message;

    /**
     * the language code.
     * Should be a pointer to the setting in the PhpSecInfo object
     *
     * @public string
     */

    public $_language = PHPSECINFO_LANG_DEFAULT;

    /**
     * Permet d'afficher la langue choisie dans PhpSecInfo.php
     * Si les chaînes n'existent pas, l'anglais est affiché par défaut.
     * function _setMessage
     *
     * @public string
     */

    public $langue_defaut;

    public $langue_definie;

    /**
     * Enter description here...
     *
     * @public mixed
     */

    public $current_value;

    /**
     * This is a hash of messages that correspond to various test result levels.
     * There are five messages, each corresponding to one of the result constants
     * (PHPSECINFO_TEST_RESULT_OK, PHPSECINFO_TEST_RESULT_NOTICE, PHPSECINFO_TEST_RESULT_WARN,
     * PHPSECINFO_TEST_RESULT_ERROR, PHPSECINFO_TEST_RESULT_NOTRUN)
     *
     * @public array
     */

    public $_messages = [];

    /**
     * Constructor for Test skeleton class
     */
    public function __construct()
    {
        // $this->_setTestValues();
        $this->_retrieveCurrentValue();

        // $this->setRecommendedValue();
        $this->_setMessages();
    }

    /**
     * Determines whether or not it's appropriate to run this test (for example, if
     * this test is for a particular library, it shouldn't be run if the lib isn't
     * loaded).
     * This is a terrible name, but I couldn't think of a better one atm.
     *
     * @return bool
     */
    public function isTestable()
    {
        return true;
    }

    /**
     * The "meat" of the test.
     * This is where the real test code goes. You should override this when extending
     *
     * @return int
     */
    public function _execTest()
    {
        return PHPSECINFO_TEST_RESULT_NOTRUN;
    }

    /**
     * This function loads up result messages into the $this->_messages array.
     * Using this method rather than setting $this->_messages directly allows result
     * messages to be inherited. This is broken out into a separate function rather
     * than the constructor for ease of extension purposes (php4 is whack, man).
     */
    public function _setMessages()
    {
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', 'This setting should be considered safe');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'en', 'This could potentially be a security issue');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'en', 'This setting may be a serious security problem');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_ERROR, 'en', 'There was an error running this test');

        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTRUN, 'en', 'This test cannot be run');

        // Afichier les messages standards en français c'est très bien, mais, ça me prive des messages anglais exisant qui ne sont pas traduits.
        // $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'fr', 'Ce paramètre devrait pouvoir être considéré comme sûr');
        // $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'fr', 'Ceci pourrait potentiellement être un problème de sécurité');
        // $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'fr', 'Ce paramètre peut constituer un grave problème de sécurité');
        // $this->setMessageForResult(PHPSECINFO_TEST_RESULT_ERROR, 'fr', 'Une erreur s\'est produite lors de l\'exécution de ce test');
        // $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTRUN, 'fr', 'Ce test ne peut pas être exécuté');
    }

    /**
     * Placeholder - extend for tests
     */
    public function _retrieveCurrentValue()
    {
        $this->current_value = 'foo';
    }

    /**
     * This is the wrapper that executes the test and sets the result code and message
     */
    public function test()
    {
        $result = $this->_execTest();

        $this->_setResult($result);
    }

    /**
     * Retrieves the result
     *
     * @return int
     */
    public function getResult()
    {
        return $this->_result;
    }

    /**
     * Retrieves the message for the current result
     *
     * @return string
     */
    public function getMessage()
    {
        if (!isset($this->_message) || empty($this->_message)) {
            $this->_setMessage($this->_result, $this->_language);
        }

        return $this->_message;
    }

    /**
     * Sets the message for a given result code and language
     * <code>
     * $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTRUN, 'en', 'This test cannot be run');
     * </code>
     *
     * @param int    $result_code
     * @param string $language_code
     * @param string $message
     */
    public function setMessageForResult($result_code, $language_code, $message)
    {
        if (!isset($this->_messages[$result_code])) {
            $this->_messages[$result_code] = [];
        }

        if (!is_array($this->_messages[$result_code])) {
            $this->_messages[$result_code] = [];
        }

        $this->_messages[$result_code][$language_code] = $message;
    }

    /**
     * returns the current value.
     * This function should be used to access the
     * value for display. All values are cast as strings
     *
     * @return string
     */
    public function getCurrentTestValue()
    {
        return $this->getStringValue($this->current_value);
    }

    /**
     * returns the recommended value.
     * This function should be used to access the
     * value for display. All values are cast as strings
     *
     * @return string
     */
    public function getRecommendedTestValue()
    {
        return $this->getStringValue($this->recommended_value);
    }

    /**
     * Sets the result code
     *
     * @param int $result_code
     */
    public function _setResult($result_code)
    {
        $this->_result = $result_code;
    }

    /**
     * Sets the $this->_message variable based on the passed result and language codes
     *
     * @param int    $result_code
     * @param string $language_code
     */
    public function _setMessage($result_code, $language_code)
    {
        $messages = $this->_messages[$result_code];

        // Afficher le français par défaut, et, sinon, la langue anglaise quand la traduction n'existe pas.
        // $message = $messages[$language_code];
        if (isset($messages[$language_code]) && $messages[$language_code] === $this->_language) {
            // $langue_defaut et $langue_definie ne devraient pas être appelées avec public ?
            $langue_defaut = 'en';

            $message = $messages[$langue_defaut];
        } else {
            $langue_definie = PHPSECINFO_LANG_DEFAULT;

            $message = isset($messages[$language_code]) ? $messages[$langue_definie] : '';
        }

        $this->_message = $message;
    }

    /**
     * Returns a link to a page with detailed information about the test
     * URL is formatted as PHPSECINFO_TEST_MOREINFO_BASEURL + testName
     *
     * @return string|bool
     * @see PHPSECINFO_TEST_MOREINFO_BASEURL
     */
    public function getMoreInfoURL()
    {
        if ($tn = $this->getTestName()) {
            // Fixed URL for 'More Information URL'.
            // https://github.com/bigdeej/PhpSecInfo/commit/f8262613ef6da51e65aa8cf31d9b4f80acb15afd#diff-0d32928ec88998768a1fb2d4fc810e19
            return PHPSECINFO_TEST_MOREINFO_BASEURL . mb_strtolower($tn);
        }

        return false;
    }

    /**
     * This retrieves the name of this test.
     * If a name has not been set, this returns a formatted version of the class name.
     *
     * @return string
     */
    public function getTestName()
    {
        if (isset($this->test_name) && !empty($this->test_name)) {
            return $this->test_name;
        }

        return ucwords(str_replace('_', ' ', get_class($this)));
    }

    /**
     * sets the test name
     *
     * @param string $test_name
     */
    public function setTestName($test_name)
    {
        $this->test_name = $test_name;
    }

    /**
     * Returns the test group this test belongs to
     *
     * @return string
     */
    public function getTestGroup()
    {
        return $this->test_group;
    }

    /**
     * sets the test group
     *
     * @param string $test_group
     */
    public function setTestGroup($test_group)
    {
        $this->test_group = $test_group;
    }

    /**
     * This function takes the shorthand notation used in memory limit settings for PHP
     * and returns the byte value.
     * Totally stolen from http://us3.php.net/manual/en/function.ini-get.php
     * <code>
     * echo 'post_max_size in bytes = ' . $this->return_bytes(ini_get('post_max_size'));
     * </code>
     *
     * @link http://php.net/manual/en/function.ini-get.php
     * @param string $val
     * @return int
     */
    public function returnBytes($val)
    {
        if (0 === (int)$val) {
            return 0;
        }

        switch (mb_strtolower(substr((string)$val, -1))) {
            case 'm':
                return (int)$val * 1048576;
            case 'k':
                return (int)$val * 1024;
            case 'g':
                return (int)$val * 1073741824;
            default:
                return $val;
        }
    }

    /**
     * This just does the usual PHP string casting, except for
     * the boolean FALSE value, where the string "0" is returned
     * instead of an empty string
     *
     * @param mixed $val
     * @return string
     */
    public function getStringValue($val)
    {
        if (false === $val) {
            return '0';
        }

        return (string)$val;
    }

    /**
     * This method converts the several possible return values from
     * allegedly "boolean" ini settings to proper booleans
     * Properly converted input values are: 'off', 'on', 'false', 'true', '', '0', '1'
     * (the last two might not be neccessary, but I'd rather be safe)
     * If the ini_value doesn't match any of those, the value is returned as-is.
     *
     * @param string $ini_key
     *            the ini_key you need the value of
     * @return bool|mixed
     */
    public function getBooleanIniValue($ini_key)
    {
        $ini_val = ini_get($ini_key);

        if (is_string($ini_val)) {
            $ini_val = mb_strtolower($ini_val);
        }

        switch ($ini_val) {
            case 'off':
                return false;
            case 'on':
                return true;
            case 'false':
                return false;
            case 'true':
                return true;
            case '0':
                return false;
            case '1':
                return true;
            case '':
                return false;
            default:
                return $ini_val;
        }
    }

    /**
     * sys_get_temp_dir provides some temp dir detection capability
     * that is lacking in versions of PHP that do not have the
     * sys_get_temp_dir() function
     *
     * @return string|null
     */
    public function sys_get_temp_dir()
    {
        // Try to get from environment variable
        if (!empty($_ENV['TMP'])) {
            return realpath($_ENV['TMP']);
        }

        if (!empty($_ENV['TMPDIR'])) {
            return realpath($_ENV['TMPDIR']);
        }

        if (!empty($_ENV['TEMP'])) {
            return realpath($_ENV['TEMP']);
        }

        return null;
    }

    /**
     * A quick function to determine whether we're running on Windows.
     * Uses the PHP_OS constant.
     *
     * @return bool
     */
    public function osIsWindows()
    {
        if (0 === mb_stripos(PHP_OS, 'WIN')) {
            return true;
        }

        return false;
    }

    /**
     * Returns an array of data returned from the UNIX 'id' command
     * includes uid, username, gid, groupname, and groups (if "exec"
     * is enabled).
     * Groups is an array of all the groups the user
     * belongs to. Keys are the group ids, values are the group names.
     * returns FALSE if no suitable function is available to retrieve
     * the data
     *
     * @return array|bool
     */
    public function getUnixId()
    {
        if ($this->osIsWindows()) {
            return false;
        }

        if (function_exists('exec') && !$this->getBooleanIniValue('safe_mode')) {
            $id_raw = exec('id');

            // uid=1000(coj) gid=1000(coj) groups=1000(coj),1001(admin)
            preg_match("|uid=(\d+)\((\S+)\)\s+gid=(\d+)\((\S+)\)\s+groups=(.+)|i", $id_raw, $matches);

            $id_data = [
                'uid'      => $matches[1],
                'username' => $matches[2],
                'gid'      => $matches[3],
                'group'    => $matches[4],
            ];

            if ($matches[5]) {
                $gs = $matches[5];

                $gs = explode(',', $gs);

                foreach ($gs as $groupstr) {
                    preg_match("/(\d+)\(([^\)]+)\)/", $groupstr, $subs);

                    $groups[$subs[1]] = $subs[2];
                }

                ksort($groups);

                $id_data['groups'] = $groups;
            }

            return $id_data;
        }

        if (function_exists('posix_getpwuid') && function_exists('posix_geteuid') && function_exists('posix_getgrgid') && function_exists('posix_getgroups')) {
            $data = posix_getpwuid(posix_getuid());

            $id_data['uid'] = $data['uid'];

            $id_data['username'] = $data['name'];

            $id_data['gid'] = $data['gid'];

            // $group_data = posix_getgrgid( posix_getegid() );
            // $id_data['group'] = $group_data['name'];
            $groups = posix_getgroups();

            foreach ($groups as $gid) {
                // $group_data = posix_getgrgid(posix_getgid());
                $id_data['groups'][$gid] = '<unknown>';
            }
        }

        return false;
    }
}
