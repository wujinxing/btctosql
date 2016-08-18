<?php

namespace BtcToSql\Repository;

use \BtcToSql\Entity\Block;
use Doctrine\ORM\EntityManager;

class BlockRepository
{
    /** @var Block $block */
    private $block;

    /** @var EntityManager $entityManager */
    private $entityManager;

    /**
     * Block constructor.
     * @param Block $block
     */
    public function __construct(Block $block, EntityManager $entityManager)
    {
        $this->block = $block;
        $this->entityManager = $entityManager;
    }

    public function save()
    {
        $this->entityManager->persist($this->block);
        try {
            $this->entityManager->flush();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

}