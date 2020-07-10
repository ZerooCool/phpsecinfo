<?php

declare(strict_types=1);

/**
 * Skeleton Test class file for Session group
 *
 * @author Ed Finkler <coj@funkatron.com>
 */

/**
 * Require the main PhpSecInfo class
 */
//require_once('PhpSecInfo/Test/Test.php');
require_once __DIR__ . '/Test.php';

/**
 * This is a skeleton class for PhpSecInfo "Session" tests
 */
class PhpSecInfo_Test_Session extends PhpSecInfo_Test
{
    /**
     * This value is used to group test results together.
     * For example, all tests related to the mysql lib should be grouped under "mysql."
     *
     * @public string
     */

    public $test_group = 'Session';

    /**
     * "Session" tests should pretty much be always testable, so the default is just to
     * return true
     *
     * @return bool
     */
    public function isTestable()
    {
        return true;
    }
}
