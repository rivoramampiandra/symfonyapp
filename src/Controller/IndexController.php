<?php


namespace App\Controller;


use App\Entity\Dirigeant;
use App\Entity\Societe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
  public function index(): Response
  {
    $number = random_int(0,10);

    $dirigeants = [];
    $societes = [];

    $dirigeants = $this->getDoctrine()->getRepository(Dirigeant::class)->findAll();
    $societes = $this->getDoctrine()->getRepository(Societe::class)->findAll();

    return $this->render('index.html.twig', [
      'number' => $number,
      'dirigeants' => $dirigeants,
      'societes' => $societes
    ]);
  }
}