<?php

namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LanguageFixtures extends Fixture
{
    public const LANGUAGE = [
        [
            'name' => 'PHP',
            'color' => '#000000',
            'image' => 'https://via.placeholder.com/150C',
            'isValid' => false,
        ],
        [
            'name' => 'Symfony',
            'color' => '#000000',
            'image' => 'https://via.placeholder.com/150C',
            'isValid' => false,
        ],
        [
            'name' => 'Javascript',
            'color' => '#000000',
            'image' => 'https://via.placeholder.com/150C',
            'isValid' => false,
        ],
        [
            'name' => 'Python',
            'color' => '#000000',
            'image' => 'https://via.placeholder.com/150C',
            'isValid' => false,
        ],
        [
            'name' => 'Angular',
            'color' => '#000000',
            'image' => 'https://via.placeholder.com/150C',
            'isValid' => false,
        ],
        [
            'name' => 'Boostrap',
            'color' => '#000000',
            'image' => 'https://via.placeholder.com/150C',
            'isValid' => false,
        ],
        [
            'name' => 'Materialize',
            'color' => '#000000',
            'image' => 'https://via.placeholder.com/150C',
            'isValid' => false,
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::LANGUAGE as $data) {
            $language = new Language();
            $language->setName($data['name'])
                ->setColor($data['color'])
                ->setImage($data['image'])
                ->setIsValid($data['isValid']);
            $manager->persist($language);
        }
        $manager->flush();
    }
}
