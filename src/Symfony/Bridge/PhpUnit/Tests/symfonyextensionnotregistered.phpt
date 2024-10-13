--TEST--
--SKIPIF--
<?php
if (!getenv('SYMFONY_PHPUNIT_VERSION') || version_compare(getenv('SYMFONY_PHPUNIT_VERSION'), '10', '<')) die('Skipping on PHPUnit < 10');
--FILE--
<?php
passthru(\sprintf('NO_COLOR=1 php %s/simple-phpunit.php -c %s/Fixtures/symfonyextension/phpunit-without-extension.xml.dist %s/SymfonyExtension.php', getenv('SYMFONY_SIMPLE_PHPUNIT_BIN_DIR'), __DIR__, __DIR__));
--EXPECTF--
PHPUnit %s

Runtime:       PHP %s
Configuration: %s/src/Symfony/Bridge/PhpUnit/Tests/Fixtures/symfonyextension/phpunit-without-extension.xml.dist

FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF                     45 / 45 (100%)

Time: %s, Memory: %s

There were 45 failures:

1) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testTimeMockIsRegistered with data set "test class namespace" ('Symfony\Bridge\PhpUnit\Tests')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

2) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testTimeMockIsRegistered with data set "namespace derived from test namespace" ('Symfony\Bridge\PhpUnit')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

3) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testTimeMockIsRegistered with data set "explicitly configured namespace" ('App')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

4) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testMicrotimeMockIsRegistered with data set "test class namespace" ('Symfony\Bridge\PhpUnit\Tests')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

5) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testMicrotimeMockIsRegistered with data set "namespace derived from test namespace" ('Symfony\Bridge\PhpUnit')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

6) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testMicrotimeMockIsRegistered with data set "explicitly configured namespace" ('App')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

7) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testSleepMockIsRegistered with data set "test class namespace" ('Symfony\Bridge\PhpUnit\Tests')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

8) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testSleepMockIsRegistered with data set "namespace derived from test namespace" ('Symfony\Bridge\PhpUnit')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

9) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testSleepMockIsRegistered with data set "explicitly configured namespace" ('App')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

10) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testUsleepMockIsRegistered with data set "test class namespace" ('Symfony\Bridge\PhpUnit\Tests')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

11) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testUsleepMockIsRegistered with data set "namespace derived from test namespace" ('Symfony\Bridge\PhpUnit')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

12) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testUsleepMockIsRegistered with data set "explicitly configured namespace" ('App')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

13) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testDateMockIsRegistered with data set "test class namespace" ('Symfony\Bridge\PhpUnit\Tests')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

14) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testDateMockIsRegistered with data set "namespace derived from test namespace" ('Symfony\Bridge\PhpUnit')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

15) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testDateMockIsRegistered with data set "explicitly configured namespace" ('App')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

16) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testGmdateMockIsRegistered with data set "test class namespace" ('Symfony\Bridge\PhpUnit\Tests')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

17) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testGmdateMockIsRegistered with data set "namespace derived from test namespace" ('Symfony\Bridge\PhpUnit')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

18) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testGmdateMockIsRegistered with data set "explicitly configured namespace" ('App')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

19) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testHrtimeMockIsRegistered with data set "test class namespace" ('Symfony\Bridge\PhpUnit\Tests')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

20) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testHrtimeMockIsRegistered with data set "namespace derived from test namespace" ('Symfony\Bridge\PhpUnit')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

21) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testHrtimeMockIsRegistered with data set "explicitly configured namespace" ('App')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

22) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testCheckdnsrrMockIsRegistered with data set "test class namespace" ('Symfony\Bridge\PhpUnit\Tests')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

23) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testCheckdnsrrMockIsRegistered with data set "namespace derived from test namespace" ('Symfony\Bridge\PhpUnit')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

24) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testCheckdnsrrMockIsRegistered with data set "explicitly configured namespace" ('App')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

25) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testDnsCheckRecordMockIsRegistered with data set "test class namespace" ('Symfony\Bridge\PhpUnit\Tests')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

26) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testDnsCheckRecordMockIsRegistered with data set "namespace derived from test namespace" ('Symfony\Bridge\PhpUnit')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

27) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testDnsCheckRecordMockIsRegistered with data set "explicitly configured namespace" ('App')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

28) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testGetmxrrMockIsRegistered with data set "test class namespace" ('Symfony\Bridge\PhpUnit\Tests')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

29) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testGetmxrrMockIsRegistered with data set "namespace derived from test namespace" ('Symfony\Bridge\PhpUnit')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

30) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testGetmxrrMockIsRegistered with data set "explicitly configured namespace" ('App')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

31) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testDnsGetMxMockIsRegistered with data set "test class namespace" ('Symfony\Bridge\PhpUnit\Tests')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

32) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testDnsGetMxMockIsRegistered with data set "namespace derived from test namespace" ('Symfony\Bridge\PhpUnit')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

33) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testDnsGetMxMockIsRegistered with data set "explicitly configured namespace" ('App')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

34) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testGethostbyaddrMockIsRegistered with data set "test class namespace" ('Symfony\Bridge\PhpUnit\Tests')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

35) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testGethostbyaddrMockIsRegistered with data set "namespace derived from test namespace" ('Symfony\Bridge\PhpUnit')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

36) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testGethostbyaddrMockIsRegistered with data set "explicitly configured namespace" ('App')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

37) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testGethostbynameMockIsRegistered with data set "test class namespace" ('Symfony\Bridge\PhpUnit\Tests')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

38) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testGethostbynameMockIsRegistered with data set "namespace derived from test namespace" ('Symfony\Bridge\PhpUnit')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

39) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testGethostbynameMockIsRegistered with data set "explicitly configured namespace" ('App')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

40) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testGethostbynamelMockIsRegistered with data set "test class namespace" ('Symfony\Bridge\PhpUnit\Tests')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

41) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testGethostbynamelMockIsRegistered with data set "namespace derived from test namespace" ('Symfony\Bridge\PhpUnit')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

42) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testGethostbynamelMockIsRegistered with data set "explicitly configured namespace" ('App')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

43) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testDnsGetRecordMockIsRegistered with data set "test class namespace" ('Symfony\Bridge\PhpUnit\Tests')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

44) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testDnsGetRecordMockIsRegistered with data set "namespace derived from test namespace" ('Symfony\Bridge\PhpUnit')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

45) Symfony\Bridge\PhpUnit\Tests\SymfonyExtension::testDnsGetRecordMockIsRegistered with data set "explicitly configured namespace" ('App')
Failed asserting that false is true.

%s/src/Symfony/Bridge/PhpUnit/Tests/SymfonyExtension.php:%d
%s/.phpunit/phpunit-%s/phpunit:%d

FAILURES!
Tests: 45, Assertions: 45, Failures: 45.
