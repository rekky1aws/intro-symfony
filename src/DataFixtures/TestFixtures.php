<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;

class TestFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = FakerFactory::create('fr_FR');

        $this->loadCategories($manager, $faker);
        $this->loadTags($manager, $faker);
                
        $manager->flush();
    }

    public function loadCategories(ObjectManager $manager, FakerGenerator $faker): void
    {
        $categoryNames = ['Anglaise', 'Française', 'Italienne', 'Allemande', 'Espagnole', 'Suisse'];

        foreach ($categoryNames as $value) {
            $category = new Category();
            $category->setName("Cuisine {$value}");
            $manager->persist($category);
        }

        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setName("Cuisine {$faker->countryCode()}");
            $manager->persist($category);
        }

        $manager->flush();
    }

    public function loadTags(ObjectManager $manager, FakerGenerator $faker): void
    {
        $tagNames = [
            'Rapide',
            'Végétarien',
            'Carné'
        ];

        foreach ($tagNames as $value) {
            $tag = new Tag();
            $tag->setName($value);
            $manager->persist($tag);
        }

        for ($i = 0; $i < 10; $i++) { 
            $tag = new Tag();
            $tag->setName("{$faker->name()}");
            $manager->persist($tag);
        }

        $manager->flush();
    }
}
