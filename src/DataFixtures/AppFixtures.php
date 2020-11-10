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


            
            $offre->setTitle($faker->sentence($nbWords = 2, $variableNbWords = true))
                ->setVille($faker->town)
                ->setDescription($faker->sentence($nbWords = 15, $variableNbWords = true))
                ->setAdresse($faker->streetAddress)
                ->setCodePostal($faker->postcode)
                ->setDateCreation($faker->dateTimeBetween($startDate = '-2 months', $endDate = '-15 days'))
                ->setDateMaj($faker->dateTimeBetween($startDate = '-10 days', $endDate = 'now'));

            $bool=$faker->boolean;
            $contrat->SetCDI($bool);

            if ($bool) {
                $contrat->SetCDD(0);
                $contrat->SetFREE(0);
                $offre->setContrat('CDI');
            }
            else {
                $bool2=$faker->boolean;
                $contrat->SetCDD($bool2);
                if ($bool2) {
                    $contrat->SetFREE(0);
                    $offre->setContrat('CDD');
                    $offre->setFinMission($faker->dateTimeBetween($startDate = 'now', $endDate = '+6 months'));
                }
                else {
                    $contrat->SetFREE(1);
                    $offre->setContrat('FREE');
                    $offre->setFinMission($faker->dateTimeBetween($startDate = 'now', $endDate = '+6 months'));
                }
            };

            $bool_tmp=$faker->boolean;
            $contrattype->setPlein($bool_tmp);

            if ($bool_tmp) {
                $contrattype->setPartiel(0);
                $offre->setContratType('plein');
            }
            else {
                $contrattype->setpartiel(1);
                $offre->setContratType('partiel');
            }


        

            
            $manager->persist($offre);
            $manager->persist($contrat);
            $manager->persist($contrattype);
    }

        $manager->flush();
    }
}
