<?php

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Comment;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for the Comment entity
 */
class Comments extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $c1 = new Comment();
        $c1->setAuthorName('John');
        $c1->setBody('Aliquam consequat nulla ipsum, in varius leo tristique eget. Duis pretium quam tellus, quis interdum purus volutpat eget. Phasellus euismod semper sodales. Nulla mattis nibh id urna malesuada faucibus. Integer ultrices ligula faucibus arcu tempor aliquet. Nunc vehicula lectus vel lorem venenatis, et dignissim nisl vehicula. Vestibulum eget enim dignissim, vehicula tellus vel, bibendum lorem. Integer nec leo nisi. Duis eget sodales dui. Aenean nec urna sagittis, euismod sapien eget, suscipit dolor.
        In nulla velit, ultrices ac scelerisque non, semper ornare');
        $c1->setPost($this->getReference('p1'));

        $c2 = new Comment();
        $c2->setAuthorName('Peek');
        $c2->setBody('Consequat nulla ipsum, in varius leo tristique eget. Duis pretium quam tellus, quis interdum purus volutpat eget. Phasellus euismod semper sodales. Nulla mattis nibh id urna malesuada faucibus. Integer ultrices ligula faucibus arcu tempor aliquet. Nunc vehicula lectus vel lorem venenatis, et dignissim nisl vehicula. Vestibulum eget enim dignissim, vehicula tellus vel, bibendum lorem. Integer nec leo nisi. Duis eget sodales dui. Aenean nec urna sagittis, euismod sapien eget, suscipit dolor.
        In nulla velit, ultrices ac scelerisque non, semper ornare');
        $c2->setPost($this->getReference('p2'));

        $c3 = new Comment();
        $c3->setAuthorName('George');
        $c3->setBody('In varius leo tristique eget. Duis pretium quam tellus, quis interdum purus volutpat eget. Phasellus euismod semper sodales. Nulla mattis nibh id urna malesuada faucibus. Integer ultrices ligula faucibus arcu tempor aliquet. Nunc vehicula lectus vel lorem venenatis, et dignissim nisl vehicula. Vestibulum eget enim dignissim, vehicula tellus vel, bibendum lorem. Integer nec leo nisi. Duis eget sodales dui. Aenean nec urna sagittis, euismod sapien eget, suscipit dolor.
        In nulla velit, ultrices ac scelerisque non, semper ornare');
        $c3->setPost($this->getReference('p3'));

        $manager->persist($c1);
        $manager->persist($c2);
        $manager->persist($c3);

        $manager->flush();

    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 20;
    }
}