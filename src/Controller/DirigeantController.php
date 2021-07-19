<?php


namespace App\Controller;


use App\Entity\Dirigeant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DirigeantController extends AbstractController
{
  /**
   * @param Request $request
   * @return JsonResponse
   */
  public function addDirigeant(Request $request): Response
  {
    $data = $request->request->all();

    $entityManager = $this->getDoctrine()->getManager();

    $dirigeant = new Dirigeant();
    $dirigeant->setMail($data['email']);
    $dirigeant->setNom($data['nom']);
    $dirigeant->setPrenoms($data['prenoms']);
    $dirigeant->setSexe($data['sexe']);

    $entityManager->persist($dirigeant);

    $entityManager->flush();

    return new JsonResponse($data);
  }

  public function getDirigeant(Request $request)
  {
    $data = $request->request->all();
    $id = $data['societeDirigeant'];
    $dirigeant = $this->getDoctrine()->getRepository(Dirigeant::class)->find($id);

    $nom = $dirigeant->getNom();
    $prenoms = $dirigeant->getPrenoms();
    $mail = $dirigeant->getMail();
    $sexe = $dirigeant->getSexe();

    $response = [
      'nom' => $nom,
      'prenoms' => $prenoms,
      'mail' => $mail,
      'sexe' => $sexe
    ];

    return new JsonResponse($response);
  }
}