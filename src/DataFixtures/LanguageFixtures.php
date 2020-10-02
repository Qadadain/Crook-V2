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
            'image' => '5f6a87796e1f4163448603.png',
            'isValid' => false,
        ],
        [
            'name' => 'Symfony',
            'color' => '#000000',
            'image' => '5f6a8785c516e351628114.png',
            'isValid' => false,
        ],
        [
            'name' => 'Javascript',
            'color' => '#000000',
            'image' => '5f6a878c92e74559005089.png',
            'isValid' => false,
        ],
        [
            'name' => 'Python',
            'color' => '#000000',
            'image' => '5f6a87947ea52288616710.png',
            'isValid' => false,
        ],
        [
            'name' => 'Angular',
            'color' => '#000000',
            'image' => '5f6a879d60a09424347488.png',
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
