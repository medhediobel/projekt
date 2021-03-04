<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Planes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class PlanesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /* creatFaker variable
        */
        

        for ($i=1; $i<5 ; $i++) {

            $category = new Category();
            $category->setTitle("Verfahrenname $i");
            $category->setDescription("V.Art $i");

            $manager->persist($category);

            for ($j=1; $j<=2 ; $j++) {

                $planes = new Planes();
                $planes->setTitle("Ortschaft $j")
                       ->setInhalt("in dem Flurbereinigungsverfahren Ilbesheim hat die Flurbereinigungsbehörde gemäß § 41 Flurbereinigungsgesetz (FlurbG) im Benehmen mit dem Vorstand der Teilnehmergemeinschaft und unter Zugrundelegung der allgemeinen Grundsätze für die zweckmäßige Neugestaltung des Flurbereinigungsgebietes einen Plan über die gemeinschaftlichen und öffentlichen Anlagen, insbesondere über die Einbeziehung, Änderung oder Neuausweisung öffentlicher Wege und Straßen sowie über die wasserwirtschaftlichen, bodenverbessernden und landschaftsgestaltenden Anlagen (Plan über die gemeinschaftlichen und öffentlichen Anlagen) aufgestellt.")  
                       ->setCreatedAt(new \DateTime())
                       ->setPlan("https://picsum.photos/id/237/200/300")
                       ->setCategory($category);
                
                $manager->persist($planes);
            

                for($k=0; $k <= mt_rand(4,6); $k++){
                    $comment = new Comment();
                    $comment->setAmt("Schutz_amt")
                            ->setAuthor("Herr Mueller")
                            ->setContent("Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.")
                            ->setCreatedAt(new \DateTime())
                            ->setArticle($planes);
                    
                    $manager->persist($comment);


                }
            } 

        }

        $manager->flush();
    }
}
