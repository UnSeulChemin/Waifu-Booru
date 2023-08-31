<?php

// require
require_once('src/controllers/comment/add.php');
require_once('src/controllers/comment/update.php');
require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');

// use
use Application\Controllers\Comment\Add\AddComment;
use Application\Controllers\Comment\Update\UpdateComment;
use Application\Controllers\Homepage\Homepage;
use Application\Controllers\Post\Post;

// router
try
{
    if (isset($_GET['page']) && $_GET['page'] !== '')
    {
        if ($_GET['page'] === 'post')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $identifier = $_GET['id'];

                (new Post())->execute($identifier);
            }

            else

            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['page'] === 'addComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $identifier = $_GET['id'];

                (new AddComment())->execute($identifier, $_POST);
            }

            else
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['page'] === 'updateComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $identifier = $_GET['id'];
                // It sets the input only when the HTTP method is POST (ie. the form is submitted).
                $input = null;

                if ($_SERVER['REQUEST_METHOD'] === 'POST')
                {
                    $input = $_POST;
                }

                (new UpdateComment())->execute($identifier, $input);
            }

            else
            {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }

        else
        {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    }

    else
    {
        (new Homepage())->execute();
    }
}

catch (Exception $exception)
{
	$errorMessage = 'Error : ' . $exception->getMessage();

    require('templates/pages/error.php');
}
