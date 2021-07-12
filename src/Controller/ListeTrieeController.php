<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\Routing\Annotation\Route;


use Doctrine\ORM\EntityManagerInterface;

use App\Entity\ListeTriee;


/**
 * Fonction de tri rapide basique.
 */
function tri_rapide($array)
{
    if(count($array) <= 1)
    {
        return $array;
    }
    else
    {
        $gauche = array();
        $droite = array();
        $pivot = $array[0];
        
        for($i = 1; $i < count($array); $i++)
        {
            if($array[$i] < $pivot)
            {
                $gauche[] = $array[$i];
            }
            else
            {
                $droite[] = $array[$i];
            }
        }
        return array_merge(tri_rapide($gauche), array($pivot), tri_rapide($droite));
    }   
}

class ListeTrieeController extends AbstractController
    {
        /**
         * Récuperer toutes les Lists triées
         * @Route("/api/list", methods={"GET"})
         */
        public function show_listes_triees(): Response
        {
            $repository = $this->getDoctrine()->getRepository(ListeTriee::class);
            $listesRaw = $repository->findAll();
            $listesReturn = array();

            //Reconstruction des objet Liste à cause des champs privés
            foreach($listesRaw as $value)
            {
                array_push($listesReturn, ["id"=> $value->getId() , "liste"=>$value->getListe() , "ordre"=>$value->getOrdre()]);
            }
            
            return new Response(
                json_encode($listesReturn)
            );
        
    }
        

        /**
         * Récuperer une List triée avec l'id
         * @Route("/api/list/{id}", methods={"GET"})
         */
        public function show_liste_triee(int $id): Response
        {

            $listeRaw = $this->getDoctrine()->getRepository(ListeTriee::class)->find($id);
            
            if (!$listeRaw)
            {
                throw $this->createNotFoundException(
                    'No list found for id '.$id
                );
            }
            
            //Reconstruction de l'objet Liste à cause des champs privés
            $listeReturn = ["id"=> $listeRaw->getId() , "liste"=>$listeRaw->getListe() , "ordre"=>$listeRaw->getOrdre()];

            return new Response(    
                json_encode($listeReturn)
            );

        }

        /** 
         * Trier la liste et le mettre dans la base de données
         * @Route("/api/list", methods={"POST"})
         */
        public function create_liste_triee(Request $request): Response
        {
            $entityManager = $this->getDoctrine()->getManager();

            $liste = new ListeTriee();
            $liste->setOrdre($request->get('ordre'));

            $listePasTriee = $request->get('liste');
            $listeTriee = tri_rapide($listePasTriee);

            if($request->get('ordre')=='decroissant')
            {
                $listeTriee = array_reverse($listeTriee);
            }

            $liste->setListe($listeTriee);
            
            $entityManager->persist($liste); 
            $entityManager->flush();
            
            //Reconstruction de l'objet Liste à cause des champs privés
            $listeReturn = ["id"=> $liste->getId() , "liste"=>$liste->getListe() , "ordre"=>$liste->getOrdre()];

            return new Response(
                json_encode($listeReturn)
            );
        }
    }

