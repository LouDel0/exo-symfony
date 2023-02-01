<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    protected $encoder;
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {

        $category1 = new Category();
        $category2 = new Category();
        $category1->setName('Legumes')->setDatetime(new DateTime())->setImage('images/vegetables.jpg');
        $category2->setName('Fruits')->setDatetime(new DateTime())->setImage('images/fruits.jpg');
        $manager->persist($category1);
        $manager->persist($category2);


        $product1 = new Product();
        $product2 = new Product();
        $product1->setName('Butternut')->setPrice(2.99)->setDatetime(new DateTime())->setCategoryId($category1);
        $product2->setName('Poire')->setPrice(3.59)->setDatetime(new DateTime())->setCategoryId($category2);
        $manager->persist($product1);
        $manager->persist($product2);


        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
