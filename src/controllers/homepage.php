<?php

namespace Application\Controllers\Homepage;

require_once('src/lib/database.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Post\PostRepository;

class Homepage
{
    public function execute()
    {
        require('templates/pages/homepage.php');
    }
}
