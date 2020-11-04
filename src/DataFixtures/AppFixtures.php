<?php

namespace App\DataFixtures;

use App\Entity\Code;
use App\Entity\Tag;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('gregory.thorel@live.fr');
        $user->setPassword($this->encoder->encodePassword($user, 'admin'));
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        for ($i = 1; $i <= 5; $i++) {
            $code = new Code();
            $code->setDescription('Description' . $i);
            $content = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus, deserunt temporibus. Quam, fuga! Fuga inventore assumenda totam, 
            blanditiis nihil soluta laboriosam nesciunt maxime doloremque vitae temporibus provident excepturi molestias cumque.";
            $code->setContent($content);
            $tag = new Tag();
            $tag->setName('test');
            $code->addTag($tag);
            $manager->persist($tag);
            $tag = new Tag();
            $tag->setName('lorem');
            $code->addTag($tag);
            $manager->persist($tag);
            $tag = new Tag();
            $tag->setName('langage' . $i);
            $code->addTag($tag);
            $manager->persist($tag);
            $manager->persist($code);
        }

        $manager->flush();
    }
}
