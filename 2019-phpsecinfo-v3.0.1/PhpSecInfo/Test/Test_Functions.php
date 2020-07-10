<?php

declare(strict_types=1);

/**
 * Skeleton Test class file for Core group
 *
 * @author Glenn S Crystal <glenn@gcosoftware.com>
 */

/**
 * Require the main PhpSecInfo class
 */
//require_once('PhpSecInfo/Test/Test.php');
require_once __DIR__ . '/Test.php';

/**
 * This is a skeleton class for PhpSecInfo "Functions" tests
 */
class PhpSecInfo_Test_Functions extends PhpSecInfo_Test
{
    /**
     * This value is used to group test results together.
     * For example, all tests related to the mysql lib should be grouped under "mysql."
     *
     * @public string
     */

    public $test_group = 'Functions';

    /**
     * "Functions" tests should pretty much be always testable, so the default is just to return true.
     *
     * @return bool
     */
    public function isTestable()
    {
        return true;
    }
}
