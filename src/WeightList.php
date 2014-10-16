<?php

namespace Sokil\Structure;

/**
 * Class used to get some identifier according to 
 * probability of this key.
 * 
 */
class WeightList
{
    private $_weights;
    
    public function __construct(array $weights)
    {
        $this->_weights = $weights;
    }
    
    public function getRandomKey()
    {
        return $this->getKey(mt_rand(0, array_sum($this->_weights)));
    }
    
    public function getKey($position)
    {
        $accumulator = 0;
        foreach($this->_weights as $key => $weight) {
            $accumulator += $weight;
            if($position <= $accumulator) {
                return $key;
            }
        }

        return $key;
    }
}