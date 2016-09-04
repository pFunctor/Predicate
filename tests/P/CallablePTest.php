<?php

declare(strict_types=1);

/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace P;

/**
 * Test {@see callablep}.
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 * @package P
 * @since 1.0
 */
class CallablePTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::\P\callablep
     */
    public function testCallablep()
    {
        $this->assertTrue(callablep('is_string'));
        $this->assertTrue(callablep('P\callablep'));
        $this->assertTrue(callablep([$this, 'testCallablep']));
        $this->assertFalse(callablep('callablep'));
    }
}
