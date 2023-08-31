<?php

// namespace
namespace Application\Controllers\Waifu;

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
      $waifuRepository = new WaifuRepository();
      $waifuRepository->connection = new DatabaseConnection();
  
      $waifus = $waifuRepository->getWaifus();
  
      // vue
      require('templates/pages/waifu.php');
    }
}
