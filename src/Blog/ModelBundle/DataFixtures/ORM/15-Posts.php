<?php

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for the Post entity
 */
class Posts extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $p1 = new Post();
        $p1->setTitle('Lorem ipsum dolor sit amet, consectetur adipiscing elit');
        $p1->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat erat eu metus varius porta. Aliquam consequat nulla ipsum, in varius leo tristique eget. Duis pretium quam tellus, quis interdum purus volutpat eget. Phasellus euismod semper sodales. Nulla mattis nibh id urna malesuada faucibus. Integer ultrices ligula faucibus arcu tempor aliquet. Nunc vehicula lectus vel lorem venenatis, et dignissim nisl vehicula. Vestibulum eget enim dignissim, vehicula tellus vel, bibendum lorem. Integer nec leo nisi. Duis eget sodales dui. Aenean nec urna sagittis, euismod sapien eget, suscipit dolor.
        In nulla velit, ultrices ac scelerisque non, semper ornare tortor. Vestibulum risus diam, euismod a ultricies at, sollicitudin sit amet tortor. Nunc volutpat vel purus id luctus. Vivamus laoreet tincidunt orci quis fringilla. Maecenas eget dictum sapien, sit amet aliquet libero. Proin a dictum leo. Nullam ac risus scelerisque, egestas eros et, fringilla sapien. Maecenas metus ipsum, molestie at suscipit in, auctor vitae lorem. Fusce adipiscing quam et orci lacinia vehicula. Duis vitae ante at massa varius blandit sit amet ut justo. In porttitor risus dui, sed dignissim magna mollis imperdiet. Ut at suscipit augue.');
        $p1->setAuthor($this->getReference('a1'));

        $p2 = new Post();
        $p2->setTitle('Proin placerat erat eu metus varius porta');
        $p2->setBody('Proin placerat erat eu metus varius porta. Aliquam consequat nulla ipsum, in varius leo tristique eget. Duis pretium quam tellus, quis interdum purus volutpat eget. Phasellus euismod semper sodales. Nulla mattis nibh id urna malesuada faucibus. Integer ultrices ligula faucibus arcu tempor aliquet. Nunc vehicula lectus vel lorem venenatis, et dignissim nisl vehicula. Vestibulum eget enim dignissim, vehicula tellus vel, bibendum lorem. Integer nec leo nisi. Duis eget sodales dui. Aenean nec urna sagittis, euismod sapien eget, suscipit dolor.
        In nulla velit, ultrices ac scelerisque non, semper ornare tortor. Vestibulum risus diam, euismod a ultricies at, sollicitudin sit amet tortor. Nunc volutpat vel purus id luctus. Vivamus laoreet tincidunt orci quis fringilla. Maecenas eget dictum sapien, sit amet aliquet libero. Proin a dictum leo. Nullam ac risus scelerisque, egestas eros et, fringilla sapien. Maecenas metus ipsum, molestie at suscipit in, auctor vitae lorem. Fusce adipiscing quam et orci lacinia vehicula. Duis vitae ante at massa varius blandit sit amet ut justo. In porttitor risus dui, sed dignissim magna mollis imperdiet. Ut at suscipit augue.');
        $p2->setAuthor($this->getReference('a2'));

        $p3 = new Post();
        $p3->setTitle('Vestibulum risus diam ultricies at');
        $p3->setBody('Vestibulum risus diam ultricies at. Proin placerat erat eu metus varius porta. Aliquam consequat nulla ipsum, in varius leo tristique eget. Duis pretium quam tellus, quis interdum purus volutpat eget. Phasellus euismod semper sodales. Nulla mattis nibh id urna malesuada faucibus. Integer ultrices ligula faucibus arcu tempor aliquet. Nunc vehicula lectus vel lorem venenatis, et dignissim nisl vehicula. Vestibulum eget enim dignissim, vehicula tellus vel, bibendum lorem. Integer nec leo nisi. Duis eget sodales dui. Aenean nec urna sagittis, euismod sapien eget, suscipit dolor.
        In nulla velit, ultrices ac scelerisque non, semper ornare tortor. Vestibulum risus diam, euismod a ultricies at, sollicitudin sit amet tortor. Nunc volutpat vel purus id luctus. Vivamus laoreet tincidunt orci quis fringilla. Maecenas eget dictum sapien, sit amet aliquet libero. Proin a dictum leo. Nullam ac risus scelerisque, egestas eros et, fringilla sapien. Maecenas metus ipsum, molestie at suscipit in, auctor vitae lorem. Fusce adipiscing quam et orci lacinia vehicula. Duis vitae ante at massa varius blandit sit amet ut justo. In porttitor risus dui, sed dignissim magna mollis imperdiet. Ut at suscipit augue.');
        $p3->setAuthor($this->getReference('a2'));


        $manager->persist($p1);
        $manager->persist($p2);
        $manager->persist($p3);

        $manager->flush();

        $this->addReference('p1', $p1);
        $this->addReference('p2', $p2);
        $this->addReference('p3', $p3);
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 15;
    }
}