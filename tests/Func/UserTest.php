<?php


namespace App\Tests\Func;


use App\DataFixtures\AppFixtures;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Faker\Factory;

class UserTest extends AbstractEndPoint
{
    private string $userPayload = '{"email": "%s", "password": "password"}';

    public function testGetUser():void
    {
        $response = $this->getResponseFromRequest(
            Request::METHOD_GET,
            '/api/users',
            '',
            [],
            false
        );
        $responseContent = $response->getContent();
        $responseDecoded = json_decode($responseContent, true);

        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDecoded);
    }
    public function testPostUser():void
    {
        $response = $this->getResponseFromRequest(
            Request::METHOD_POST,
            '/api/users',
            $this->getPayload(),
            [],
            false
        );
        $responseContent = $response->getContent();
        $responseDecoded = json_decode($responseContent);

        self::assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDecoded);
    }

    public function testGetDefaultUser():void
    {
        $response = $this->getResponseFromRequest(
            Request::METHOD_GET,
            '/api/users',
            '',
            ['email'=> 'admin@mail.com'],
            false
        );
        $responseContent = $response->getContent();
        $responseDecoded = json_decode($responseContent, true);

        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDecoded);
//        dump($responseDecoded);
//        return $responseDecoded[0]['id'];
    }
    private function getPayload(): string
    {
        $faker = Factory::create();
        return sprintf($this->userPayload, $faker->email);
    }
}