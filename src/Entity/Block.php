<?php

namespace BtcToSql\Entity;

/**
 * @Entity
 * @Table(name="blocks")
 */
class Block
{
    /**
     * @Id
     * @Column(type="string", length=64, unique=true)
     */
    private $hash;

    /** @Column(type="integer") */
    private $size;

    /** @Column(type="integer") */
    private $height;

    /** @Column(type="integer") */
    private $version;

    /** @Column(type="string", length=64) */
    private $merkleroot;

    private $tx;

    /** @Column(type="bigint") */
    private $time;

    /** @Column(type="bigint", nullable=true) */
    private $mediantime;

    /** @Column(type="integer") */
    private $nonce;

    /** @Column(type="string", length=8) */
    private $bits;

    /** @Column(type="float") */
    private $difficulty;

    /** @Column(type="string", length=64) */
    private $chainwork;

    /** @Column(type="string", length=64) */
    private $previousblockhash;

    /** @Column(type="string", length=64) */
    private $nextblockhash;



    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     * @return Block
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return Block
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return Block
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param int $version
     * @return Block
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getMerkleroot()
    {
        return $this->merkleroot;
    }

    /**
     * @param string $merkleroot
     * @return Block
     */
    public function setMerkleroot($merkleroot)
    {
        $this->merkleroot = $merkleroot;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTx()
    {
        return $this->tx;
    }

    /**
     * @param mixed $tx
     * @return Block
     */
    public function setTx($tx)
    {
        $this->tx = $tx;
        return $this;
    }

    /**
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param int $time
     * @return Block
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return int
     */
    public function getMediantime()
    {
        return $this->mediantime;
    }

    /**
     * @param int $mediantime
     * @return Block
     */
    public function setMediantime($mediantime)
    {
        $this->mediantime = $mediantime;
        return $this;
    }

    /**
     * @return int
     */
    public function getNonce()
    {
        return $this->nonce;
    }

    /**
     * @param int $nonce
     * @return Block
     */
    public function setNonce($nonce)
    {
        $this->nonce = $nonce;
        return $this;
    }

    /**
     * @return string
     */
    public function getBits()
    {
        return $this->bits;
    }

    /**
     * @param string $bits
     * @return Block
     */
    public function setBits($bits)
    {
        $this->bits = $bits;
        return $this;
    }

    /**
     * @return float
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * @param float $difficulty
     * @return Block
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
        return $this;
    }

    /**
     * @return string
     */
    public function getChainwork()
    {
        return $this->chainwork;
    }

    /**
     * @param string $chainwork
     * @return Block
     */
    public function setChainwork($chainwork)
    {
        $this->chainwork = $chainwork;
        return $this;
    }

    /**
     * @return string
     */
    public function getPreviousblockhash()
    {
        return $this->previousblockhash;
    }

    /**
     * @param string $previousblockhash
     * @return Block
     */
    public function setPreviousblockhash($previousblockhash)
    {
        $this->previousblockhash = $previousblockhash;
        return $this;
    }

    /**
     * @return string
     */
    public function getNextblockhash()
    {
        return $this->nextblockhash;
    }

    /**
     * @param string $nextblockhash
     * @return Block
     */
    public function setNextblockhash($nextblockhash)
    {
        $this->nextblockhash = $nextblockhash;
        return $this;
    }


    /**
     * @param Block $block
     * @return string
     */
    public function jsonEncode(Block $block)
    {
        return json_encode($block);
    }

    /**
     * @param string $json
     * @return Block
     */
    public function jsonDecode(string $json)
    {
        $b = json_decode($json, true);

        if($b["height"] == 0) $b["previousblockhash"] = 0;

        $this->setHash($b["hash"])
            ->setSize($b["size"])
            ->setHeight($b["height"])
            ->setVersion($b["version"])
            ->setMerkleroot($b["merkleroot"])
            ->setTime($b["time"])
            ->setNonce($b["nonce"])
            ->setBits($b["bits"])
            ->setDifficulty($b["difficulty"])
            ->setChainwork($b["chainwork"])
            ->setPreviousblockhash($b["previousblockhash"])
            ->setNextblockhash($b["nextblockhash"]);

        return $this;
    }
}