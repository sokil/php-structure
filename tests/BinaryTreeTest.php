<?php

namespace Sokil\Structure;

class BinaryTreeTest extends \PHPUnit_Framework_TestCase
{
    public function testAddNode()
    {
        $binaryTree = new BinaryTree(16, 'ROOT');
        $binaryTree->addNode(45, 'A');
        $binaryTree->addNode(43, 'B');
        $binaryTree->addNode(49, 'C');
        $binaryTree->addNode(40, 'D');
        $binaryTree->addNode(12, 'E');

        $node = $binaryTree->findNode(43);

        $this->assertNotEmpty($node);

        $this->assertEquals('B', $node->getMetadata());
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionmessage Value already added
     */
    public function testAdd_Existed()
    {
        $binaryTree = new BinaryTree(16, 'ROOT');
        $binaryTree->addNode(45, 'A');
        $binaryTree->addNode(43, 'B');
        $binaryTree->addNode(45, 'C');
    }

    public function testGetNode_Unexisted()
    {
        $binaryTree = new BinaryTree(16, 'ROOT');
        $binaryTree->addNode(45, 'A');
        $binaryTree->addNode(43, 'B');
        $binaryTree->addNode(49, 'C');
        $binaryTree->addNode(40, 'D');
        $binaryTree->addNode(12, 'E');

        $this->assertNull($binaryTree->findNode(343));
    }
}