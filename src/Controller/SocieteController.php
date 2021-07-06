<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class SocieteController
{
  public function addSociete(Request $request) {
      $data = $request->request->all();

      dd($data);

      return new JsonResponse($data);
  }
}