<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bundle\FrameworkBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\DefinitionDecorator;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class CachePoolPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        foreach ($container->findTaggedServiceIds('cache.pool') as $id => $tags) {
            $adapter = $pool = $container->getDefinition($id);

            while (!isset($tags[0]['namespace_arg_index']) && $adapter instanceof DefinitionDecorator) {
                $adapter = $container->findDefinition($adapter->getParent());
                $tags = $adapter->getTag('cache.pool');
            }

            if (!isset($tags[0]['namespace_arg_index'])) {
                throw new \InvalidArgumentException(sprintf('Invalid "cache.pool" tag for service "%s": attribute "namespace_arg_index" is missing.', $id));
            }

            if (!$pool->isAbstract() && 0 <= $namespaceArgIndex = $tags[0]['namespace_arg_index']) {
                $pool->replaceArgument($namespaceArgIndex, $this->getNamespace($id));
            }
        }
    }

    private function getNamespace($id)
    {
        return substr(str_replace('/', '-', base64_encode(md5('symfony.'.$id, true))), 0, 10);
    }
}
