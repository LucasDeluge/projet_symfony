<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // Création de faker
        require_once 'vendor/autoload.php';

        $faker = Faker\Factory::create('fr_FR');

        for($i=0;$i<10;$i++){
            // Création et remplissage d'un nouveau produit
            $product = new Product();
            $product->setName($faker->name)
            ->setPrice($faker->randomFloat(2,1,50))
            ->setDescription($faker->paragraph(5));

          // Persister ( insert ) l'objet en base de donnée
          $manager->persist($product);

          // On exécute la requête
          $manager->flush();
        }
    }
}
