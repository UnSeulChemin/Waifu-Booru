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

    // fetch all
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

    // fetch by id
    public function getWaifu(string $identifier): ?Waifu
    {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM waifu WHERE id = ?");
        $statement->execute([$identifier]);

        $row = $statement->fetch();

        if ($row === false)
        {
            return null;
        }

        $waifu = new Waifu();
        $waifu->identifier = $row['id'];
        $waifu->name = $row['name'];
        $waifu->type = $row['type'];

        return $waifu;
    }

    // create
    public function createWaifu(string $name, string $type): bool
    {
        $statement = $this->connection->getConnection()->prepare('INSERT INTO waifu(name, type) VALUES(?, ?)');
        $affectedLines = $statement->execute([$name, $type]);

        return ($affectedLines > 0);
    }

    // update
    public function updateWaifu(string $identifier, string $name, string $type): bool
    {
        $statement = $this->connection->getConnection()->prepare('UPDATE waifu SET name = ?, type = ? WHERE id = ?');
        $affectedLines = $statement->execute([$name, $type, $identifier]);

        return ($affectedLines > 0);
    }

    // delete
    public function deleteWaifu(string $identifier): bool
    {
        $statement = $this->connection->getConnection()->prepare('DELETE FROM waifu WHERE id = ?');
        $affectedLines = $statement->execute([$identifier]);

        return ($affectedLines > 0);
    }
}
