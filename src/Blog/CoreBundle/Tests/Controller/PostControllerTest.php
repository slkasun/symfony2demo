<?php

namespace Blog\CoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class PostControllerTest
 */
class PostControllerTest extends WebTestCase
{
    /**
     * Tests posts index
     */
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isSuccessful(), 'The responce was not successful.');

        $this->assertCount(3, $crawler->filter('h2'), 'There should be 3 displayed posts.');
    }

    /**
     * Test show post
     */
    public function testShow()
    {
        $client = static::createClient();

        $post = $client->getContainer()->get('doctrine')->getRepository('ModelBundle:Post')->findFirst();

        $crawler = $client->request('GET', '/' . $post->getSlug());

        $this->assertTrue($client->getResponse()->isSuccessful(), 'The responce was not successful.');

        $this->assertEquals($post->getTitle(), $crawler->filter('h1')->text(), 'Invalid poet title');

        $this->assertGreaterThanOrEqual(1, $crawler->filter('article.comment')->count(), 'There should be at least one comment.');
    }

    /**
     * Test create a comment
     */
    public function testCreateComment()
    {
        $client = static::createClient();

        $post = $client->getContainer()->get('doctrine')->getRepository('ModelBundle:Post')->findFirst();

        $crawler = $client->request('GET', '/' . $post->getSlug());

        $buttonCrawlerNode = $crawler->selectButton('Send');

        $form = $buttonCrawlerNode->form(array(
            'blog_modelbundle_comment[authorName]' => 'Commenter name',
            'blog_modelbundle_comment[body]' => 'This is the comment body'
        ));

        $client->submit($form);

        $this->assertTrue(
            $client->getResponse()->isRedirect('/' . $post->getSlug()), 'There was no redirecting after submitting the form.'
        );

        $crawler = $client->followRedirect();

        $this->assertCount(
            1,
            $crawler->filter('html:contains("Your comment was submitted successfully")'),
            'There was not any confirmation message'
        );
    }
}
