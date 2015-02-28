<?php

namespace TodoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
    }

    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/new');
    }

    public function testUpdate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/update');
    }

    public function testTaskType()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/new');

        $form = $crawler->selectButton('Send')->form();

        $this->assertGreaterThan(0, $crawler->filter('h1')->count());

        $form['TaskType[descricao]'] = 'Teste unite crawler';
        $crawler = $client->submit($form);

        $this->assertTrue($client->getResponse()->isSuccessful());

    }

    public function testTaskTypeErro()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/new');

        $form = $crawler->selectButton('Send')->form();

        $this->assertGreaterThan(0, $crawler->filter('h1')->count());
        $crawler = $client->submit($form);

        $this->assertTrue(!$client->getResponse()->isSuccessful());

    }


}
