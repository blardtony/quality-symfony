<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        $data = file_get_contents('non_existent_file.txt');
        return new JsonResponse($data);
    }
    public function complexLogic($input) {
        if ($input > 10) {
            if ($input < 20) {
                return 'Between 10 and 20';
            } else {
                return 'Greater than 20';
            }
        } else {
            return '10 or less';
        }
    }
}
