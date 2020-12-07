<?php


namespace App\Tests\Func;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractEndPoint extends WebTestCase
{
    private array $serverInformation = ['ACCEPT'=>'application/json','CONTENT_TYPE'=>'application/json'];

    public function gerResponseFromRequest(string $methode,string $uri, string $payload= ''): Response
    {
        $client = self::createClient();

        $client->request(
            $methode,
            $uri . '.json',
            [],
            [],
            $this->serverInformation,
            $payload
        );

        return $client->getResponse();
    }
}