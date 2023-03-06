<?php

namespace App\DataFixtures;

use App\Entity\Book;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création d'une vingtaine de livres
        for ($i=0; $i < 20; $i++) { 
            # Instanciation d'un nouveau livre
            $book = new Book;
            $book->setTitle('Livre ' .$i);
            $book->setCoverText('Quatrième de couverture ' .$i);
            $book->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($book);
        }
        $manager->flush();
    }
}
