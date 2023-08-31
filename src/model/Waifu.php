<?php

// namespace
namespace Application\Model\Waifu;

// require
require_once('src/lib/database.php');

// use
use Application\Lib\Database\DatabaseConnection;

class Waifu
{
    public string $identifier;
    public string $name;
    public string $type;
}

class WaifuRepository
{
    public DatabaseConnection $connection;

    public function getWaifus(): array
    {
        $statement = $this->connection->getConnection()->query("SELECT * FROM waifu ORDER BY id DESC LIMIT 5");

        $waifus = [];

        while (($row = $statement->fetch()))
        {
            $waifu = new Waifu();
            $waifu->identifier = $row['id'];
            $waifu->name = $row['name'];
            $waifu->type = $row['type'];

            $waifus[] = $waifu;
        }

        return $waifus;
    }

}
