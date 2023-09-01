<?php

// namespace
namespace Application\Controllers\WaifuController;

// require
require_once('src/lib/database.php');
require_once('src/model/Waifu.php');

// use
use Application\Lib\Database\DatabaseConnection;
use Application\Model\Waifu\WaifuRepository;

class Waifu
{
    public function execute()
    {
        $connection = new DatabaseConnection();

        $waifuRepository = new WaifuRepository();
        $waifuRepository->connection = $connection;
  
        $waifus = $waifuRepository->getWaifus();
  
        // vue
        require('templates/pages/waifu.php');
    }

    public function update(string $identifier, ?array $input)
    {
        // It handles the form submission when there is an input.
        if ($input !== null)
        {
            $name = null;
            $type = null;

            if (!empty($input['name']) && !empty($input['type']))
            {
                $name = $input['name'];
                $type = $input['type'];
            }
            
            else
            {
                throw new \Exception('Les données du formulaire sont invalides.');
            }

            $waifuRepository = new WaifuRepository();
            $waifuRepository->connection = new DatabaseConnection();

            $success = $waifuRepository->updateWaifu($identifier, $name, $type);

            if (!$success)
            {
                throw new \Exception('Impossible de modifier !');
            }
            
            else
            {
                header('Location: ../');
            }
        }

        // Otherwise, it displays the form.
        $waifuRepository = new WaifuRepository();
        $waifuRepository->connection = new DatabaseConnection();
        $waifu = $waifuRepository->getWaifu($identifier);

        if ($waifu === null)
        {
            throw new \Exception("Votre waifu $identifier n'existe pas.");
        }

        require('templates/pages/waifu_update.php');
    }

    public function create(array $input)
    {
        $name = null;
        $type = null;

        if (!empty($input['name']) && !empty($input['type']))
        {
            $name = $input['name'];
            $type = $input['type'];
        }
        
        else
        {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

        $waifuRepository = new WaifuRepository();
        $waifuRepository->connection = new DatabaseConnection();
        $success = $waifuRepository->createWaifu($name, $type);

        if (!$success)
        {
            throw new \Exception('Impossible d\'ajouter !');
        }
        
        else
        {
            header('Location: waifu');
        }
    }

    public function delete(string $identifier)
    {
        $waifuRepository = new WaifuRepository();
        $waifuRepository->connection = new DatabaseConnection();
        $success = $waifuRepository->deleteWaifu($identifier);

        if (!$success)
        {
            throw new \Exception("Votre waifu $identifier n'existe pas.");
        }
        
        else
        {
            header('Location: ../waifu');
        }

    }
}
