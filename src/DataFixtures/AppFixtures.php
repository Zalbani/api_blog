<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private  UserPasswordEncoderInterface $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create();
        for($i= 0; $i<10; $i++){
            $user = new User();
            $passHash = $this->encoder->encodePassword($user, 'password');
            $user->setEmail($faker->email)
                ->setPassword($passHash);

            if($i % 3 === 0){
                $user->setStatus(false)
                    ->setAge(23);
            }


            $manager->persist($user);

            for ($j= 0; $j< random_int(5,15); $j++){
                $article = (new Article())->setAuthor($user)
                ->setContent($faker->text(300))
                ->setTitle($faker->text(20));

                $manager->persist($article);
            }
        }

        $manager->flush();
    }
}
