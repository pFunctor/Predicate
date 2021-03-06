<?php

declare(strict_types=1);

/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace p\str;

/**
 * Test {@see lowerp}.
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 * @package p
 * @since 1.0
 */
class LowerpTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::\p\str\lowerp
     */
    public function testLowerp()
    {
        $this->assertTrue(lowerp('hello'));
        $this->assertFalse(lowerp('heLlo'));
    }
}
