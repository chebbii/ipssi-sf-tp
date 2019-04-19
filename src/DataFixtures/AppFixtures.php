<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $blogPost = new BlogPost();

        $blogPost
            ->setTitle('My first test')
            ->setDescription('nada dadaa')
            ->setBody('loreme lloeremmf loremm loremmkmolo kirkkdir')
            ->setAuthor('$author');
        $manager->persist($blogPost);

        $manager->flush();
    }
}
