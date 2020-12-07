<?php


namespace App\Tests\Unit;

use App\Entity\Article;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    private Article $article;

    protected function setUp():void
    {
        parent::setUp();

        $this->article = new Article();
    }

    public function testGetTitle():void
    {
        $value = 'Test title';
        $this->article = new Article();
        $response = $this->article->setTitle($value);

        self::assertInstanceOf(Article::class, $response);
        self::assertEquals($value, $this->article->getTitle());

    }
    public function testGetContent():void
    {
        $value = 'My content for test !';
        $response = $this->article->setContent($value);

        self::assertInstanceOf(Article::class, $response);
        self::assertEquals($value, $this->article->getContent());
    }
    public function testGetAuthor():void
    {
        $value = new User();
        $response = $this->article->setAuthor($value);

        self::assertInstanceOf(Article::class, $response);
        self::assertInstanceOf(User::class, $this->article->getAuthor());

    }


}