<?php

namespace App\DataFixtures;

use App\Entity\Sheet;
use App\Entity\Tutorial;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class TutorialFixtures extends Fixture implements DependentFixtureInterface
{
    public const TUTORIAL = [
        [
            'title' => 'Titre est ICI du tuto t',
            'description' => 'La description du tuto est la suivante',
            'content' => 'tutu toto tuto Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pretium nibh ipsum consequat nisl 
              vel pretium lectus quam id. Ultricies tristique nulla aliquet enim tortor at auctor urna. Id aliquet lectus proin nibh nisl condimentum id.
              Ut tellus elementum sagittis vitae et leo duis ut diam. Tortor pretium viverra suspendisse potenti nullam ac tortor vitae purus. Fames ac turpis egestas sed tempus.
              Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio. Elementum curabitur vitae nunc sed. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet.
              Non arcu risus quis varius quam quisque id diam. Vehicula ipsum a arcu cursus vitae congue mauris rhoncus. 
              Amet mauris commodo quis imperdiet massa. Netus et malesuada fames ac turpis. Id semper risus in hendrerit gravida rutrum quisque. 
              Faucibus interdum posuere lorem ipsum dolor sit amet consectetur adipiscing. Amet nulla facilisi morbi tempus iaculis urna id.
              Tellus cras adipiscing enim eu turpis. Feugiat vivamus at augue eget arcu. Ut morbi tincidunt augue interdum velit euismod in pellentesque. Massa ultricies mi quis hendrerit dolor magna.
               Ultricies mi eget mauris pharetra. Cras ornare arcu dui vivamus arcu felis bibendum ut tristique.'
        ],
        [
            'title' => 'Titre est ICI du tuto to',
            'description' => 'La description du tuto est la suivante',
            'content' => 'tutu toto tuto Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pretium nibh ipsum consequat nisl 
              vel pretium lectus quam id. Ultricies tristique nulla aliquet enim tortor at auctor urna. Id aliquet lectus proin nibh nisl condimentum id.
              Ut tellus elementum sagittis vitae et leo duis ut diam. Tortor pretium viverra suspendisse potenti nullam ac tortor vitae purus. Fames ac turpis egestas sed tempus.
              Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio. Elementum curabitur vitae nunc sed. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet.
              Non arcu risus quis varius quam quisque id diam. Vehicula ipsum a arcu cursus vitae congue mauris rhoncus. 
              Amet mauris commodo quis imperdiet massa. Netus et malesuada fames ac turpis. Id semper risus in hendrerit gravida rutrum quisque. 
              Faucibus interdum posuere lorem ipsum dolor sit amet consectetur adipiscing. Amet nulla facilisi morbi tempus iaculis urna id.
              Tellus cras adipiscing enim eu turpis. Feugiat vivamus at augue eget arcu. Ut morbi tincidunt augue interdum velit euismod in pellentesque. Massa ultricies mi quis hendrerit dolor magna.
               Ultricies mi eget mauris pharetra. Cras ornare arcu dui vivamus arcu felis bibendum ut tristique.'
        ],
        [
            'title' => 'Titre est ICI du tuto tot',
            'description' => 'La description du tuto est la suivante',
            'content' => 'tutu toto tuto Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pretium nibh ipsum consequat nisl 
              vel pretium lectus quam id. Ultricies tristique nulla aliquet enim tortor at auctor urna. Id aliquet lectus proin nibh nisl condimentum id.
              Ut tellus elementum sagittis vitae et leo duis ut diam. Tortor pretium viverra suspendisse potenti nullam ac tortor vitae purus. Fames ac turpis egestas sed tempus.
              Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio. Elementum curabitur vitae nunc sed. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet.
              Non arcu risus quis varius quam quisque id diam. Vehicula ipsum a arcu cursus vitae congue mauris rhoncus. 
              Amet mauris commodo quis imperdiet massa. Netus et malesuada fames ac turpis. Id semper risus in hendrerit gravida rutrum quisque. 
              Faucibus interdum posuere lorem ipsum dolor sit amet consectetur adipiscing. Amet nulla facilisi morbi tempus iaculis urna id.
              Tellus cras adipiscing enim eu turpis. Feugiat vivamus at augue eget arcu. Ut morbi tincidunt augue interdum velit euismod in pellentesque. Massa ultricies mi quis hendrerit dolor magna.
               Ultricies mi eget mauris pharetra. Cras ornare arcu dui vivamus arcu felis bibendum ut tristique.'
        ],
        [
            'title' => 'Titre est ICI du tuto toto',
            'description' => 'La description du tuto est la suivante',
            'content' => 'tutu toto tuto Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pretium nibh ipsum consequat nisl 
              vel pretium lectus quam id. Ultricies tristique nulla aliquet enim tortor at auctor urna. Id aliquet lectus proin nibh nisl condimentum id.
              Ut tellus elementum sagittis vitae et leo duis ut diam. Tortor pretium viverra suspendisse potenti nullam ac tortor vitae purus. Fames ac turpis egestas sed tempus.
              Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio. Elementum curabitur vitae nunc sed. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet.
              Non arcu risus quis varius quam quisque id diam. Vehicula ipsum a arcu cursus vitae congue mauris rhoncus. 
              Amet mauris commodo quis imperdiet massa. Netus et malesuada fames ac turpis. Id semper risus in hendrerit gravida rutrum quisque. 
              Faucibus interdum posuere lorem ipsum dolor sit amet consectetur adipiscing. Amet nulla facilisi morbi tempus iaculis urna id.
              Tellus cras adipiscing enim eu turpis. Feugiat vivamus at augue eget arcu. Ut morbi tincidunt augue interdum velit euismod in pellentesque. Massa ultricies mi quis hendrerit dolor magna.
               Ultricies mi eget mauris pharetra. Cras ornare arcu dui vivamus arcu felis bibendum ut tristique.'
        ],
        [
            'title' => 'Titre est ICI du tuto toto t',
            'description' => 'La description du tuto est la suivante',
            'content' => 'tutu toto tuto Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pretium nibh ipsum consequat nisl 
              vel pretium lectus quam id. Ultricies tristique nulla aliquet enim tortor at auctor urna. Id aliquet lectus proin nibh nisl condimentum id.
              Ut tellus elementum sagittis vitae et leo duis ut diam. Tortor pretium viverra suspendisse potenti nullam ac tortor vitae purus. Fames ac turpis egestas sed tempus.
              Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio. Elementum curabitur vitae nunc sed. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet.
              Non arcu risus quis varius quam quisque id diam. Vehicula ipsum a arcu cursus vitae congue mauris rhoncus. 
              Amet mauris commodo quis imperdiet massa. Netus et malesuada fames ac turpis. Id semper risus in hendrerit gravida rutrum quisque. 
              Faucibus interdum posuere lorem ipsum dolor sit amet consectetur adipiscing. Amet nulla facilisi morbi tempus iaculis urna id.
              Tellus cras adipiscing enim eu turpis. Feugiat vivamus at augue eget arcu. Ut morbi tincidunt augue interdum velit euismod in pellentesque. Massa ultricies mi quis hendrerit dolor magna.
               Ultricies mi eget mauris pharetra. Cras ornare arcu dui vivamus arcu felis bibendum ut tristique.'
        ],
        [
            'title' => 'Titre est ICI du tuto toto ta',
            'description' => 'La description du tuto est la suivante',
            'content' => 'tutu toto tuto Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pretium nibh ipsum consequat nisl 
              vel pretium lectus quam id. Ultricies tristique nulla aliquet enim tortor at auctor urna. Id aliquet lectus proin nibh nisl condimentum id.
              Ut tellus elementum sagittis vitae et leo duis ut diam. Tortor pretium viverra suspendisse potenti nullam ac tortor vitae purus. Fames ac turpis egestas sed tempus.
              Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio. Elementum curabitur vitae nunc sed. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet.
              Non arcu risus quis varius quam quisque id diam. Vehicula ipsum a arcu cursus vitae congue mauris rhoncus. 
              Amet mauris commodo quis imperdiet massa. Netus et malesuada fames ac turpis. Id semper risus in hendrerit gravida rutrum quisque. 
              Faucibus interdum posuere lorem ipsum dolor sit amet consectetur adipiscing. Amet nulla facilisi morbi tempus iaculis urna id.
              Tellus cras adipiscing enim eu turpis. Feugiat vivamus at augue eget arcu. Ut morbi tincidunt augue interdum velit euismod in pellentesque. Massa ultricies mi quis hendrerit dolor magna.
               Ultricies mi eget mauris pharetra. Cras ornare arcu dui vivamus arcu felis bibendum ut tristique.'
        ],
    ];

    public function getDependencies() :array
    {
        return [UserFixtures::class, LanguageFixtures::class];
    }

    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager)
    {
        $i = 0;
        foreach (self::TUTORIAL as $data) {
            $sheet = new Tutorial();
            $author = random_int(1, 20);
            $language = random_int(1, 7);
            $sheet->setTitle($data['title'] . $i);
            $sheet->setDescription($data['description']);
            $sheet->setContent($data['content']);
            $sheet->setAuthor($manager->find('App:User', $author));
            $sheet->setLanguage($manager->find('App:Language', $language));
            $sheet->setSlug($this->slugger->slug($data['title']));
            $manager->persist($sheet);
            $i++;
        }
        $manager->flush();
    }
}
