<?php

namespace app;

use MsgBundle\Entity\Msg;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use mysqli;

/**
 * MsgRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
final class MsgRepository
{

        /**
         * @var EntityRepository
         */
        private $repository ;

    public function __construct(EntityManagerInterface $entityManager)
    {
                $this->repository = $entityManager->getRepository(Msg::class);
            }

}
