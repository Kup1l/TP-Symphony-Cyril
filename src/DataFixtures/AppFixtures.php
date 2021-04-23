<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use \DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $article = new Article();
            $article->setTitle($faker->sentence());
            $article->setSubtitle($faker->sentence());
            $article->setAuthor($faker->name());
            $article->setCreatedAt(new DateTime());
            $article->setBody($faker->text(200));
            $article->setImage("none.png");
            $manager->persist($article);
        }

        $manager->flush();
    }
}
