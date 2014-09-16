<?php

namespace Sokil\Structure;

class BinaryTree
{
    /**
     * @var mixed any value
     */
    private $_value;

    private $_metadata;

    /**
     * @var \Sokil\Structure\BinaryTree
     */
    private $_parentNode = null;

    /**
     * @var \Sokil\Structure\BinaryTree
     */
    private $_leftNode;

    /**
     * @var \Sokil\Structure\BinaryTree
     */
    private $_rightNode;

    public function __construct($value, $metadata = null, BinaryTree $parentNode = null)
    {
        $this->_value = $value;

        $this->_metadata = $metadata;

        $this->_parentNode = $parentNode;
    }

    /**
     * Add new node
     */
    public function addNode($value, $metadata = null)
    {
        if($this->hasValue($value)) {
            throw new \InvalidArgumentException('Value already added');
        }

        if($value < $this->_value) {
            if($this->_leftNode) {
                $this->_leftNode->addNode($value, $metadata);
            } else {
                $this->_leftNode = new self($value, $metadata, $this);
            }
        } else {
            if($this->_rightNode) {
                $this->_rightNode->addNode($value, $metadata);
            } else {
                $this->_rightNode = new BinaryTree($value, $metadata, $this);
            }
        }
    }

    public function findNode($value)
    {
        // finding me
        if($this->hasValue($value)) {
            return $this;
        }

        if($value < $this->_value) {


            // node not found
            if(!$this->_leftNode) {
                return null;
            }

            // find in sub-nodes
            if(!$this->_leftNode->hasValue($value)) {
                $n = $this->_leftNode->findNode($value);
                return $n;
            }

            // this node found
            return $this->_leftNode;

        } else {

            // node not found
            if(!$this->_leftNode) {
                return null;
            }

            // find in sub-nodes
            if(!$this->_rightNode->hasValue($value)) {
                return $this->_rightNode->findNode($value);
            }

            // this node found
            return $this->_rightNode;
        }


    }

    public function hasValue($value)
    {
        return $value === $this->_value;
    }

    public function getValue()
    {
        return $this->_value;
    }

    public function getMetadata()
    {
        return $this->_metadata;
    }
}