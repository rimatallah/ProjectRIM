<?php
// src/AppBundle/DependencyInjection/Security/Factory/WsseFactory.php
namespace UserBundle\DependencyInjection\Security\Factory;

use UserBundle\Security\Authentication\Provider\WsseProvider;
use UserBundle\Security\Firewall\WsseListener;
use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\SecurityFactoryInterface;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class WsseFactory implements SecurityFactoryInterface
{
    public function create(ContainerBuilder $container, $id, $config, $userProvider, $defaultEntryPoint)
    {
        $providerId = 'security.authentication.provider.wsse.'.$id;
        $container
            ->setDefinition($providerId, new ChildDefinition(WsseProvider::class))
            ->setArgument(0, new Reference($userProvider))
            ->setArgument(2, $config['lifetime']);

        $container
            ->setDefinition($providerId, new ChildDefinition(WsseProvider::class))
            ->setArgument(0, new Reference($userProvider))
        ;

        $listenerId = 'security.authentication.listener.wsse.'.$id;
        $container->setDefinition($listenerId, new ChildDefinition(WsseListener::class));



        return [$providerId, $listenerId, $defaultEntryPoint];
    }

    public function getPosition()
    {
        return 'pre_auth';
    }

    public function getKey()
    {
        return 'wsse';
    }

    public function addConfiguration(NodeDefinition $node)
    {
        $node
            ->children()
            ->scalarNode('lifetime')->defaultValue(3)
            ->end();

    }
}
