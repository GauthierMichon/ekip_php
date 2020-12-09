<?php

namespace App\DataFixtures;

use App\Entity\Contrats;
use App\Entity\ContratType;
use App\Entity\Offres;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('en_HK');

        for($i = 0 ; $i < 10 ; $i++){

            $offre = new Offres();
            $contrat = new Contrats();
            $contrattype = new ContratType();

            
            $array = ['CDD', 'CDI', 'FREE'];
            $contrat_array = $faker->randomElements($array);

            $array2 = ['plein', 'partiel'];
            $contrattype_array = $faker->randomElements($array2);


            
            $offre->setTitle($faker->sentence($nbWords = 2, $variableNbWords = true))
                ->setVille($faker->town)
                ->setDescription($faker->sentence($nbWords = 15, $variableNbWords = true))
                ->setAdresse($faker->streetAddress)
                ->setCodePostal($faker->postcode)
                ->setDateCreation($faker->dateTimeBetween($startDate = '-2 months', $endDate = '-15 days'))
                ->setContrat($contrat_array[0])
                ->setContratType($contrattype_array[0]);


            if ($contrat_array[0] == 'CDI') {
                $contrat->SetCDI(1)
                    ->SetCDD(0)
                    ->SetFREE(0);
            }
            else if ($contrat_array[0] == 'CDD') {
                $contrat->SetCDI(0)
                    ->SetCDD(1)
                    ->SetFREE(0);
                $offre->setFinMission($faker->dateTimeBetween($startDate = 'now', $endDate = '+6 months'));
            }
            else if ($contrat_array[0] == 'FREE') {
                $contrat->SetCDI(0)
                    ->SetCDD(0)
                    ->SetFREE(1);
                $offre->setFinMission($faker->dateTimeBetween($startDate = 'now', $endDate = '+6 months'));
            }


            if ($contrattype_array[0] == 'plein') {
                $contrattype->setPartiel(0)
                    ->setPlein(1);
            }
            else if ($contrattype_array[0] == 'partiel') {
                $contrattype->setPartiel(1)
                    ->setPlein(0);
            }
            
            $manager->persist($offre);
            $manager->persist($contrat);
            $manager->persist($contrattype);
    }

        $manager->flush();
    }
}
