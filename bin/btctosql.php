#!/usr/bin/env php
<?php

use BtcToSql\Service\BitcoinCli;
use BtcToSql\Entity\Block;

require_once __DIR__."/../bootstrap.php";
require_once __DIR__."/../config/bitcoin-cli.local.php";

$bitcoinCli = new BitcoinCli("ezio.gotdns.com", "8332", "eziocm", "mpam0212");

/** @var \Doctrine\ORM\EntityManager $entityManager */
$entityManager = $entityManager;
$entityManager->getRepository(Block::class);
$query = $entityManager->createQuery("SELECT MAX(b.height) + 1 FROM BtcToSql\Entity\Block b");
$blockCount = (int) $query->getResult()[0][1];

while (true) {
    echo "Block: $blockCount\n";
    $json = $bitcoinCli->getBlock($blockCount);
    $block = new Block();
    $block->jsonDecode($json);
    $repo = new \BtcToSql\Repository\BlockRepository($block, $entityManager);
    try {
        $repo->save();
        $blockCount++;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}