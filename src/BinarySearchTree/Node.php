<?php

namespace Sokil\DataStructure\Tree\BinarySearchTree;

class Node
{
    /**
     * @var mixed any value
     */
    private $_value;

    private $_metadata;

    /**
     * @var Node
     */
    private $_parentNode = null;

    /**
     * @var Node
     */
    private $_leftNode;

    /**
     * @var \Node
     */
    private $_rightNode;

    public function __construct($value, $metadata = null, Node $parentNode = null)
    {
        $this->_value = $value;

        $this->_metadata = $metadata;

        $this->_parentNode = $parentNode;
    }

    /**
     * Add new node
     */
    public function addRecursive($value, $metadata = null)
    {
        if($this->hasValue($value)) {
            throw new \InvalidArgumentException('Value already added');
        }

        if($value < $this->_value) {
            if($this->_leftNode) {
                $this->_leftNode->addRecursive($value, $metadata);
            } else {
                $this->_leftNode = new self($value, $metadata, $this);
            }
        } else {
            if($this->_rightNode) {
                $this->_rightNode->addRecursive($value, $metadata);
            } else {
                $this->_rightNode = new self($value, $metadata, $this);
            }
        }

        return $this;
    }

    public function removeChild(Node $node)
    {
        //var_dump($node->getValue());
        if($this->_leftNode && $this->_leftNode->hasValue($node->getValue())) {
            $this->_leftNode = null;
            return $this;
        }

        if($this->_rightNode && $this->_rightNode->hasValue($node->getValue())) {
            $this->_rightNode = null;
            return $this;
        }
    }

    public function remove()
    {
        // node is parent
        if(!$this->_parentNode) {
            throw new \Exception('Removing parent node not implemented');
            return $this;
        }

        // node has no children
        if(!$this->_leftNode && !$this->_rightNode) {
            $this->_parentNode->removeChild($this);
            return $this;
        }

        // node has only left child
        if($this->_leftNode) {
            throw new \Exception('Removing node with only left child not implemented');
            return $this;
        }

        // node has only right child
        if($this->_rightNode) {
            throw new \Exception('Removing node with only right child not implemented');
            return $this;
        }

        // node has both children
        throw new \Exception('Removing node with both children not implemented');

        return $this;
    }

    /**
     * Find node by value through child nodes
     *
     * @param $value
     * @return null|Node
     */
    public function findRecursive($value)
    {
        if($value < $this->_value) {


            // node not found
            if(!$this->_leftNode) {
                return null;
            }

            // find in sub-nodes
            if(!$this->_leftNode->hasValue($value)) {
                return $this->_leftNode->findRecursive($value);
            }

            // this node found
            return $this->_leftNode;

        } else {

            // node not found
            if(!$this->_rightNode) {
                return null;
            }

            // find in sub-nodes
            if(!$this->_rightNode->hasValue($value)) {
                return $this->_rightNode->findRecursive($value);
            }

            // this node found
            return $this->_rightNode;
        }


    }

    public function hasValue($value)
    {
        return $value === $this->_value;
    }

    public function getMetadata()
    {
        return $this->_metadata;
    }

    public function getValue()
    {
        return $this->_value;
    }
}