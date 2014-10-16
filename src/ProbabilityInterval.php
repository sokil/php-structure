<?php

namespace Sokil\Structure;

class ProbabilityInterval
{
    private $_weights;
    
    public function __construct(array $weights)
    {
        $this->_weights = $weights;
    }
    
    public function getRandomKey()
    {
        return $this->getKeyByProbability(mt_rand(0, array_sum($this->_weights)));
    }
    
    public function getKeyByProbability($probability)
    {
        $accumulator = 0;
        foreach($this->_weights as $key => $value) {
            $accumulator += $value;
            if($probability <= $accumulator) {
                return $key;
            }
        }

        return $key;
    }
}