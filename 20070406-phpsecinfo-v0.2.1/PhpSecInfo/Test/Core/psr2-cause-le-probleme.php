<?php
/**
 * Skeleton Test class file for Session group
 * 
 * @package PhpSecInfo
 * @author Ed Finkler <coj@funkatron.com>
 */
/**
 * require the main PhpSecInfo class
 */
require_once ('PhpSecInfo/Test/Test.php');

 */
class PhpSecInfo_Test_Session extends PhpSecInfo_Test
{
    public $test_group = 'Session';

    /**
     * "Session" tests should pretty much be always testable, so the default is
     * just to return true
     *
     * @return boolean
     */
    function isTestable()
    {
        return true;
    }
    // Hé bien non :/ !!!
}
?>