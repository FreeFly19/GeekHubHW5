<?php
/**
 * Created by PhpStorm.
 * User: FreeFly
 * Date: 09.11.15
 * Time: 23:26
 */

namespace Tests;

use Models\Book;

class BookTest extends \PHPUnit_Framework_TestCase
{

    public function getPdo()
    {
        return $this->getMockBuilder("Tests\\PdoMock")
            ->getMock();
    }

    public function testGetTableName()
    {
        $this->assertEquals("books", Book::getTableName());
    }

    public function testParent()
    {
        Book::setPDO($this->getPdo());
        $this->assertInstanceOf("App\\AbstractModel", new Book());
    }

    public function testPdoSetterGetter()
    {
        $pdo = $this->getPdo();
        Book::setPDO($pdo);

        $this->assertEquals($pdo, Book::getPDO());
    }

    public function testInsert()
    {
        $pdo = $this->getPdo();
        $pdo->method("lastInsertId")->willReturn(1234);

        $stmt = $this->getMock("\\PDOStatement", ['bindParam']);

        $pdo->method("prepare")->willReturn($stmt);

        Book::setPDO($pdo);

        $book = new Book();
        $this->assertNull($book->id);

        $book->save();
        $this->assertEquals(1234, $book->id);
    }

    public function testRemove()
    {
        $pdo = $this->getPdo();
        $stmt = $this->getMock("\\PDOStatement", ['bindParam']);
        $pdo->method("prepare")->willReturn($stmt);

        Book::setPDO($pdo);

        $book = new Book();
        $book->id = 15;
        $book->remove();

        $this->assertNull($book->id);
    }

} 