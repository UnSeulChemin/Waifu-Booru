<?php

// require
require_once('src/controllers/HomepageController.php');
require_once('src/controllers/WaifuController.php');

// use
use Application\Controllers\HomepageController\Homepage;
use Application\Controllers\WaifuController\Waifu;

// router
try
{
    if (isset($_GET['page']) && !empty($_GET['page']))
    {
        if ($_GET['page'] === 'waifu' || $_GET['page'] === 'wcreate' || $_GET['page'] === 'wupdate' || $_GET['page'] === 'wdelete')
        {
            if ($_GET['page'] === 'wcreate')
            {
                if ($_SERVER['REQUEST_METHOD'] === 'POST')
                {
                    $input = $_POST;
    
                    (new Waifu())->create($input);
                }
            }

            else if ($_GET['page'] === 'wupdate')
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
    
                    (new Waifu())->update($identifier, $input);
                }

                else
                {
                    throw new Exception('Aucune Waifu de reçu.');
                }
            }

            else if ($_GET['page'] === 'wdelete')
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $identifier = $_GET['id'];

                    (new Waifu())->delete($identifier);
                }         
            }
            
            else
            {
                (new Waifu())->execute();
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
	$errorMessage = $exception->getMessage();

    require('templates/pages/error/error_404.php');
}
