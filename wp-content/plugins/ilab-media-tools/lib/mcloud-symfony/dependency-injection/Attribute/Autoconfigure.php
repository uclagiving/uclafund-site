<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MediaCloud\Vendor\Symfony\Component\DependencyInjection\Attribute;

/**
 * An attribute to tell how a base type should be autoconfigured.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::IS_REPEATABLE)]
class Autoconfigure
{
    public function __construct(
        ?array $tags = null,
        ?array $calls = null,
        ?array $bind = null,
        $lazy = null,
        ?bool $public = null,
        ?bool $shared = null,
        ?bool $autowire = null,
        ?array $properties = null,
        $configurator = null
    ) {
    }
}
