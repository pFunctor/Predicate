<?php declare(strict_types=1);

/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Predicate\Framework;

/**
 * Composed predicate that represents a short-circuiting logical AND of this predicate and another
 *
 * When evaluating the composed predicate, if this predicate is false, then the other predicate is not evaluated.
 * Any exceptions thrown during evaluation of either predicate are relayed to the caller.
 *
 * If evaluation of this predicate throws an exception, the other predicate will not be evaluated.
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 * @package Framework\Framework
 * @since 1.0
 */
final class AndP implements Predicate
{

    /**
     * @var array
     */
    private $predicates;

    /**
     * Composed predicate that represents  a short-circuiting logical AND of this predicate and another.
     *
     * @param Predicate $p1
     * @param Predicate $p2
     * @param Predicate[] ...$next
     */
    public function __construct(Predicate $p1, Predicate $p2, Predicate ...$next)
    {
        $this->predicates = array_merge(
            [$p1, $p2],
            $next
        );
    }

    /**
     * @inheritdoc
     */
    public function __invoke(...$args): bool
    {
        foreach ($this->predicates as $predicate) {
            if (false === $predicate(...$args)) {
                return false;
            }
        }

        return true;
    }
}
