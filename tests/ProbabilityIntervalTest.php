<?php

namespace Sokil\Structure;

class ProbabilityIntervalTest extends \PHPUnit_Framework_TestCase
{
    public function testGetKeyByProbability()
    {
        $probabilityInterval = new ProbabilityInterval(array(
            'apple'     => 40,
            'orange'    => 30,
            'lemon'     => 20,
            'tomato'    => 7,
            'potato'    => 3,
        ));

        $this->assertEquals('apple', $probabilityInterval->getKeyByProbability(0));

        $this->assertEquals('apple', $probabilityInterval->getKeyByProbability(4));

        $this->assertEquals('orange', $probabilityInterval->getKeyByProbability(45));

        $this->assertEquals('orange', $probabilityInterval->getKeyByProbability(70));

        $this->assertEquals('lemon', $probabilityInterval->getKeyByProbability(71));

        $this->assertEquals('potato', $probabilityInterval->getKeyByProbability(100));
    }
    
    function test_array_rand_weight()
    {
        $weights = array(
            'apple'     => 40,
            'orange'    => 30,
            'lemon'     => 20,
            'tomato'    => 7,
            'potato'    => 3,
        );
        
        $probabilityInterval = new ProbabilityInterval($weights);

        $stat = array();

        for($i = 0; $i < 10000; $i++) {
            $key = $probabilityInterval->getRandomKey();

            if(!isset($stat[$key])) {
                $stat[$key] = 0;
            }

            $stat[$key]++;
        }

        arsort($stat);
        $this->assertEquals(array_keys($weights), array_keys($stat));
    }
}
