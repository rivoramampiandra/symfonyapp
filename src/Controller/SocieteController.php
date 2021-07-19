<?php


namespace App\Controller;


use App\Entity\Societe;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SocieteController extends AbstractController
{
  public function addSociete(Request $request): Response  {
      $data = $request->request->all();

      $entityManager = $this->getDoctrine()->getManager();

      $societe = new Societe();
      $societe->setNom($data['nom_societe']);
      $societe->setDescription($data['description']);
      $societe->setCodePostal($data['code_postal']);
      $societe->setVille($data['ville']);
      $societe->setDirigeant($data['dirigeant']);
      $societe->setType('SARL');

      $entityManager->persist($societe);

      $entityManager->flush();

      return new JsonResponse($data);
  }
}