<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DirigeantController extends AbstractController
{
  /**
   * @param Request $request
   * @return JsonResponse
   */
  public function addDirigeant(Request $request) {
      $data = $request->request->all();

      return new JsonResponse($data);
  }
}