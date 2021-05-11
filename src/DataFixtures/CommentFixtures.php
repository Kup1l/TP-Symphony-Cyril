<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use \DateTime;

class CommentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $comment = new Comment();
                $comment->setName($faker->word());
                $comment->setEmail($faker->email);
                $comment->setCreatedAt(new DateTime());
                $comment->setComment($faker->text(200));
                $article = $this->getReference("article" . $i);
                $comment->setArticle($article);
                $article->addComment($comment);
                $manager->persist($comment);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AppFixtures::class,
        ];
    }
}
