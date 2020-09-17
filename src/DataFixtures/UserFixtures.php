<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public const ADMIN = [
        'quentin.adadain@gmail.com' => [
            'roles' => ['ROLE_ADMIN'],
            'pseudo' => 'Rolls',
            'avatar' => 'https://via.placeholder.com/150C',
            'password' => 'Admin33'
        ],
        'thomas.luminic@outlook.fr' => [
            'roles' => ['ROLE_ADMIN'],
            'pseudo' => 'Thomss',
            'avatar' => 'https://via.placeholder.com/150C',
            'password' => 'Admin33'
        ],
    ];

    public const USER = [
        'start_email' => 'user',
        'end_email' => '@test.com',
        'roles' => ['ROLE_USER'],
        'pseudo' => 'User',
        'avatar' => 'https://via.placeholder.com/150C',
        'password' => 'User33',
    ];


    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        foreach (self::ADMIN as $email => $data) {
            $admin = new User();
            $admin->setEmail($email)
                ->setRoles($data['roles'])
                ->setAvatar($data['avatar'])
                ->setPseudo($data['pseudo'])
                ->setPassword($this->passwordEncoder->encodePassword($admin, $data['password']));
            $manager->persist($admin);
        }
        for ($i = 1; $i <= 20; $i++) {
            $user = new User();
            $user->setEmail(self::USER['start_email'] . $i . self::USER['end_email'])
                ->setRoles(self::USER['roles'])
                ->setPseudo(self::USER['pseudo'] . $i)
                ->setAvatar(self::USER['avatar'])
                ->setPassword($this->passwordEncoder->encodePassword($user, self::USER['password']));
            $manager->persist($user);
        }
        $manager->flush();
    }
}
