<?php

namespace BtcToSql\Service;


class BitcoinCli
{
    private $host;
    private $port;
    private $user;
    private $pass;

    public function __construct($host, $port, $user, $pass)
    {
        $this->host = $host;
        $this->port = $port;
        $this->user = $user;
        $this->pass = $pass;
    }


    public function getBlock(int $blockCount) {
        $params = "-rpcconnect=$this->host -rpcport=$this->port -rpcuser=$this->user -rpcpassword=$this->pass";
        $blockhash = "bitcoin-cli $params getblockhash $blockCount";
        $getblock = "bitcoin-cli $params getblock $($blockhash)";

        $json = shell_exec($getblock);

        $decoded = json_decode($json);
        if(!property_exists($decoded, "hash"))
            throw new \Exception("Request error");

        return $json;
    }
}