<?php

namespace App\Controller;

use App\Entity\Player;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class DownScoreController extends AbstractController
{
    public function __invoke(Player $data, EntityManagerInterface $em, Request $request)
    {
        //$_SERVER['HTTP_X_FORWARDED_FOR']
        $data->setScore($data->getScore() - 20);
        $em->flush();
        return $data;
    }
}
