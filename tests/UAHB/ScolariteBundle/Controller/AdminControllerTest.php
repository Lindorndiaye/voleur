<?php

namespace UAHB\ScolariteBundle\Controller;

use UAHB\ScolariteBundle\Entity\Faculte;
use UAHB\ScolariteBundle\Entity\Departement;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    /**
     * @test
     */
    public function faculte_add_list()
    {
        $client = static::createClient();

        $container = $client->getContainer();


        $crawler = $client->request('GET', '/facultes');
        $em = $container->get('doctrine')->getManager();
        $facs = $em->getRepository(Faculte::class)->findAll();
        $depts = $em->getRepository(Departement::class)->findAll();

        $response = $client->getResponse();

        $responseContent = $response->getContent();

        $this->AssertEquals(200, $response->getStatusCode());

        $this->AssertContains('Sciences et Technologies', $responseContent);

        $this->assertCount(3, $facs);

        $this->assertCount(3, $depts);
    }


    /**
     * @test
     */
    public function faculte_add()
    {
        $client = static::createClient();

        $container = $client->getContainer();

        $crawler = $client->request('POST', '/facultes', array(' '=>'Gestion Economique','validerFaculter'=>'Enregistrer'));
        
        $em = $container->get('doctrine')->getManager();
        $facs = $em->getRepository(Faculte::class)->findAll();

        $response = $client->getResponse();

        $responseContent = $response->getContent();

        $this->AssertEquals(200, $response->getStatusCode());

        $this->assertCount(3, $facs);
    }
}