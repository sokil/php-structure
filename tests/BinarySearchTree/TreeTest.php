<?php

namespace Sokil\DataStructure\Tree\BinarySearchTree;

/**
 *  Binary Search Tree structure
 * 
 *           16
 *         /    \
 *       13      45
 *      /  \    /  \
 *     11  14  43   49
 *    /       /  \   \
 *   10      40  44   99
 */
class TreeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Tree
     */
    private $binaryTree;
    
    public function setUp()
    {
        $this->binaryTree = new Tree();
        $this->binaryTree->add(16, 'ROOT');
        $this->binaryTree->add(45, 'A');
        $this->binaryTree->add(43, 'B');
        $this->binaryTree->add(49, 'C');
        $this->binaryTree->add(40, 'D');
        $this->binaryTree->add(13, 'E');
        $this->binaryTree->add(11, 'F');
        $this->binaryTree->add(14, 'G');
        $this->binaryTree->add(44, 'H');
        $this->binaryTree->add(10, 'I');
        $this->binaryTree->add(99, 'J');
    }
    
    public function testAddNode()
    {
        // find root
        $node = $this->binaryTree->find(16);

        $this->assertNotEmpty($node);
        $this->assertEquals('ROOT', $node);

        // find first level child
        $node = $this->binaryTree->find(45);

        $this->assertNotEmpty($node);
        $this->assertEquals('A', $node);

        // find third level child
        $node = $this->binaryTree->find(43);

        $this->assertNotEmpty($node);
        $this->assertEquals('B', $node);

        // find fourth level child
        $node = $this->binaryTree->find(44);

        $this->assertNotEmpty($node);
        $this->assertEquals('H', $node);
    }

    public function testFind_NoNodesAdded()
    {
        $binaryTree = new Tree;
        $this->assertNull($binaryTree->find(42));
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionmessage Value already added
     */
    public function testAdd_Existed()
    {
        $this->binaryTree->add(16, 'ANOTHER_ROOT');
    }

    public function testFind_UnexistedRightNode()
    {
        $this->assertNull($this->binaryTree->find(90));
    }

    public function testFindNode_UnexistedLeftNode()
    {
        $this->assertNull($this->binaryTree->find(12));
    }

    public function testDelete_RootNode()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testDelete_RightLeaf_NoChildLeaf()
    {
        $this->assertEquals('J', $this->binaryTree->find(99));

        $this->binaryTree->delete(99);

        $this->assertNull($this->binaryTree->find(99));
    }

    public function testDelete_LeftLeaf_NoChildLeaf()
    {
        $this->assertEquals('I', $this->binaryTree->find(10));

        $this->binaryTree->delete(10);

        $this->assertNull($this->binaryTree->find(10));
    }

    public function testDelete_OnlyLeftChildLeaf()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testDelete_OnlyRightChildLeaf()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testDelete_BothChildLeafs()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}