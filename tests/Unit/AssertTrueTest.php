<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

/**
 * AssertTrueTest
 *
 * @package Tests\Unit
 */
class AssertTrueTest extends TestCase
{
    /**
     * Let's test the obvious
     *
     * @return void
     */
    public function testObviousTrue(): void
    {
        self::assertTrue(true);
    }

    /**
     * Yeah, isn't obvious, a lot of people don't know how to negation works
     *
     * @return void
     */
    public function testMoreOrLessObvious(): void
    {
        self::assertTrue(!false);
    }

    /**
     * Complex, but is sufficient to deploy in friday and move this problem to future
     *
     * @return void
     */
    public function testPleaseINeedDoDeployItInFriday(): void
    {
        self::assertTrue(!!!((1 === 2) !== false));
    }

    /**
     * I need to show to world that I know how to use anonymous classes
     *
     * @return void
     */
    public function testWithAnonymousClass(): void
    {
        $myClass = new class
        {
            /**
             * @return bool
             */
            public function getTrue(): bool
            {
                return true;
            }
        };

        self::assertTrue($myClass->getTrue());
    }

    /**
     * I also know how to use the anonymous function
     *
     * @return void
     */
    public function testWithAnonymousFunction(): void
    {
        /**
         * @return bool
         */
        $fn = function () {
            return true;
        };

        self::assertTrue($fn());
    }

    /**
     * Of course, I want to claim true as many times as I want!
     *
     * @return void
     */
    public function testWithGeneratorFunction(): void
    {
        $generator = function () {
            for ($i = 0; $i <= 20; $i += 2) {
                yield true;
            }
        } ;

        foreach ($generator() as $everTrue) {
            self::assertTrue($everTrue);
        }
    }

    /**
     * I invoke you to pass
     *
     * @return void
     */
    public function testWithInvokableCLass(): void
    {
        $invoke = new class
        {
            private const VALUE = true;

            /**
             * @return bool
             */
            public function __invoke()
            {
                return self::VALUE === true;
            }
        };

        self::assertTrue($invoke());
    }

    /**
     * Yes, we can use hadouken function pattern to assert true too
     *
     * @return void
     */
    public function testWithHadoukenFunctions(): void
    {
        $hadouken = function () {
            return function () {
                return function () {
                    return function () {
                        return function () {
                            return function () {
                                return true;
                            };
                        };
                    };
                };
            };
        };

        self::assertTrue($hadouken()()()()()());
    }

    /**
     * I don't know why developers is afraid about recursive calls, is pretty cute
     *
     * @return void
     */
    public function testWithRecursiveCall(): void
    {
        /**
         * @param int $randomNumber
         * @return bool
         */
        function myAmazingAwesomeRecursiveFunction(int $randomNumber): bool
        {
            if (50 > $randomNumber) {
                return true;
            }

            return myAmazingAwesomeRecursiveFunction($randomNumber++);
        }

        self::assertTrue(
            myAmazingAwesomeRecursiveFunction(0)
        );
    }

    /**
     * Different types for different true asserts
     *
     * @return void
     */
    public function testWithDifferentTypes(): void
    {
        self::assertTrue((7 == '7'));
        self::assertTrue(!(7 === '7'));
        self::assertTrue((7 === (int) '7'));
        self::assertTrue($this instanceof TestCase);
        self::assertTrue(is_string('7'));
        self::assertTrue(is_int(7));
        self::assertTrue(is_array([]));
        self::assertTrue(is_bool((bool) 'false' === false));
    }

    /**
     * Yes, PHP still have weird non strict comparision for strings
     *
     * @return void
     */
    public function testWithNonStrictStringComparison()
    {
        self::assertTrue("zero" == 0);
        self::assertTrue("1" == "01");
        self::assertTrue("10" == "1e1");
        self::assertTrue(100 == "1e2");
    }

    /**
     * Have you ever seen this kind of ternary behavior? Yeah, it works on PHP < 7.4
     *
     * @return void
     */
    public function testNonObviousTernaryBehaviour()
    {
        self::assertTrue((true ? 'true' : false ? 't' : 'f') === 't');
    }

    /**
     * I don't know why i'm doing it.
     *
     * @return void
     */
    public function testWithASCIICodes() : void
    {
        self::assertTrue(chr(116) . chr(114) . chr(117) . chr(101) == 'true');
    }
    
    /**
    * Will the anchor's truth be true or false?!
    *
    * @return void
    */
    public function testAnchorsTruth(): void
    {
        $true = false;
        function theAnchorsTruth(&$mustBeTrue) {
            $mustBeTrue = true;
        }
        theAnchorsTruth($true);
        self::assertTrue($true);
    }
    
    /**
    * @return void
    */
    public function testPostIncremental(): void
    {
        $zero = 0;

        self::assertTrue( $zero+++$zero++ == 1);
    }
}
