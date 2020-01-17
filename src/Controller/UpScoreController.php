<?php

namespace App\Controller;

use App\Entity\Player;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UpScoreController extends AbstractController
{
    public function __invoke(Player $data, EntityManagerInterface $em)
    {
        $data->setScore($data->getScore()+1);
        $em->flush();
        return $data;
    }
}
