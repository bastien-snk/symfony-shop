<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = [];
        $libelles = ["rondes", "triangulaires", "carrées"];
        for ($i = 0; $i < 3; $i++) {
            $categorie = new Categorie();
            $categorie->setLibelle($libelles[$i]);
            $categories[$i] = $categorie;

            $manager->persist($categorie);
        }
        $manager->flush();

        $produits = ["rouges carrées", "vert carrées", "bleu carrées", "bleu rondes", "bleu triangulaires"];
        $tarifs = [20, 22, 43, 12, 12];
        $id_categories = [2, 2, 2, 0, 1];
        for ($i = 0; $i < 5; $i++) {
            $produit = new Produit();
            $produit->setLibelle("gomettes " . $produits[$i]);
            $produit->setTarif($tarifs[$i]);
            $produit->setIdCategorie($categories[$id_categories[$i]]);

            $manager->persist($produit);
        }

        $manager->flush();
    }
}
