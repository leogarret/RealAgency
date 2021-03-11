<?php
namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController {

    /**
     * @var PropertyRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(PropertyRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/biens", name="property.index") 
     * @return Response
     */
    public function index() : Response
    {
        // $property = new Property();
        // $property->setTitle('Les flamants roses')
        // ->setPrice(4400000)
        // ->setRooms(32)
        // ->setBedrooms(12)
        // ->setDescription("2,5 ha sur une colline bord de mer, surplombant 30 km de côte méditerranéenne protégée, flamants roses, 300 jours de soleil par an, à l’abri des regards, entièrement sécurisés et paysagés. 700 m2 habitables.")
        // ->setSurface(700)
        // ->setFloor(3)
        // ->setHeat(1)
        // ->setCity('Mireval')
        // ->setAdress("15 rue des flamants roses")
        // ->setZipCode('34000');

        // $em = $this->getDoctrine()->getManager();
        // $em->persist($property);
        // $em->flush();

        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties'
        ]);
    }

    /**
     * @Route("/biens/{slug}-{id}", name="property.show", requirements={"slug": "[a-z0-9\-]*"})
     * @return Response 
     */
    public function show(Property $property, string $slug) : Response
    {
        if ($property->getSlug() !== $slug) {
            return $this->redirectToRoute('property.show', [
                'id' => $property->getId(),
                'slug' => $property->getSlug()
            ], 301);
        }

        return $this->render('property/show.html.twig', [
            'current_menu' => 'properties',
            'property' => $property
        ]);
    }

}