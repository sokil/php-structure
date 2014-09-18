<?php

namespace Sokil\Structure;

use Sokil\Structure\BinarySearchTree\Node;

class BinarySearchTree
{
    /**
     * @var \Sokil\Structure\BinarySearchTree\Node
     */
    private $_rootNode;

    /**
     * @param $value
     * @param null $metadata
     * @return \Sokil\Structure\BinarySearchTree
     */
    public function add($value, $metadata = null)
    {
        if($this->_rootNode) {
            $this->_rootNode->addRecursive($value, $metadata);
        } else {
            $this->_rootNode = new Node($value, $metadata);
        }

        return $this;
    }

    /**
     * @param $value
     * @return null|\Sokil\Structure\BinarySearchTree\Node
     */
    public function find($value)
    {
        if(!$this->_rootNode) {
            return null;
        }

        if($this->_rootNode->hasValue($value)) {
            return $this->_rootNode->getMetadata();
        }

        $node = $this->_rootNode->findRecursive($value);
        if($node) {
            return $node->getMetadata();
        }

        return null;
    }

    /**
     * Delete node
     *
     * @param $value
     * @return \Sokil\Structure\BinarySearchTree
     * @throws \Exception
     */
    public function delete($value)
    {
        if(!$this->_rootNode) {
            return $this;
        }

        // deleting root node
        if($this->_rootNode->hasValue($value)) {
            $this->_rootNode->remove();
        }

        // deleting child node
        $node = $this->_rootNode->findRecursive($value);
        if($node) {
            $node->remove();
        }

        return $this;
    }
}