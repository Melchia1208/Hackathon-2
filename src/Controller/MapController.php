<?php

namespace App\Controller;

use App\Repository\PersonnageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MapController extends AbstractController
{
    /**
     * @var PersonnageRepository
     */
    private $personnageRepository;

    /**
     * MapController constructor.
     * @param PersonnageRepository $personnageRepository
     */
    public function __construct(PersonnageRepository $personnageRepository)
    {
        $this->personnageRepository = $personnageRepository;
    }

    /**
     * @Route("/map", name="map")
     */
    public function index()
    {
        return $this->render('map/index.html.twig', [
            'personnages' => $this->personnageRepository->findAll()
        ]);
    }
}
