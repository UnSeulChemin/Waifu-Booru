<?php

// namespace
namespace Application\Controllers\Homepage;

// require
require_once('src/lib/database.php');

// use
use Application\Lib\Database\DatabaseConnection;
use Application\Model\Post\PostRepository;

class Homepage
{
    public function execute()
    {
        require('templates/pages/homepage.php');
    }
}
