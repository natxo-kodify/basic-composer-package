<?php
include "Checker.php";

class CheckerTest extends \PHPUnit_Framework_TestCase
{
    protected $checker;

    public function setUp()
    {
        $this->checker = new Checker();
    }

    public function testSingles()
    {
        $roll = array(1, 2, 3, 4, 5);
        $this->assertSame(1, $this->checker->check($roll, Checker::ONES));
        $this->assertSame(2, $this->checker->check($roll, Checker::TWOS));
        $this->assertSame(3, $this->checker->check($roll, Checker::THREES));
        $this->assertSame(4, $this->checker->check($roll, Checker::FOURS));
        $this->assertSame(5, $this->checker->check($roll, Checker::FIVES));
        $this->assertSame(0, $this->checker->check($roll, Checker::SIXES));
        $roll = array(1, 2, 2, 4, 5);
        $this->assertSame(4, $this->checker->check($roll, Checker::TWOS));
        $roll = array(1, 3, 3, 3, 5);
        $this->assertSame(9, $this->checker->check($roll, Checker::THREES));
        $roll = array(1, 3, 3, 3, 3);
        $this->assertSame(12, $this->checker->check($roll, Checker::THREES));

    }

    public function testDoubles()
    {
        $roll = array(1, 1, 2, 3, 4);
        $this->assertSame(2, $this->checker->check($roll, Checker::PAIR));
        $roll = array(1, 2, 2, 3, 4);
        $this->assertSame(4, $this->checker->check($roll, Checker::PAIR));
        $roll = array(1, 2, 3, 3, 4);
        $this->assertSame(6, $this->checker->check($roll, Checker::PAIR));
        $roll = array(1, 4, 3, 3, 4);
        $this->assertSame(8, $this->checker->check($roll, Checker::PAIR));
        $roll = array(1, 5, 3, 5, 4);
        $this->assertSame(10, $this->checker->check($roll, Checker::PAIR));
        $roll = array(6, 5, 5, 5, 6);
        $this->assertSame(12, $this->checker->check($roll, Checker::PAIR));
        $roll = array(1, 2, 3, 4, 6);
        $this->assertSame(0, $this->checker->check($roll, Checker::PAIR));
    }

    public function testTwoPairs()
    {
        $roll = array(1, 5, 2, 3, 4);
        $this->assertSame(0, $this->checker->check($roll, Checker::TWOPAIRS));
        $roll = array(1, 1, 2, 3, 4);
        $this->assertSame(0, $this->checker->check($roll, Checker::TWOPAIRS));
        $roll = array(1, 1, 2, 2, 4);
        $this->assertSame(6, $this->checker->check($roll, Checker::TWOPAIRS));
        $roll = array(1, 2, 2, 3, 3);
        $this->assertSame(10, $this->checker->check($roll, Checker::TWOPAIRS));
        $roll = array(3, 4, 2, 3, 4);
        $this->assertSame(14, $this->checker->check($roll, Checker::TWOPAIRS));
        $roll = array(5, 4, 2, 5, 4);
        $this->assertSame(18, $this->checker->check($roll, Checker::TWOPAIRS));
        $roll = array(6, 5, 5, 6, 4);
        $this->assertSame(22, $this->checker->check($roll, Checker::TWOPAIRS));
    }

    public function testTriples ()
    {

        $roll = array(1,1,1,2,3);
        $this->assertSame(3, $this->checker->check($roll, Checker::TRIPLES));
        $roll = array(1,2,1,2,2);
        $this->assertSame(6, $this->checker->check($roll, Checker::TRIPLES));
        $roll = array(3,3,1,2,3);
        $this->assertSame(9, $this->checker->check($roll, Checker::TRIPLES));
        $roll = array(1,4,1,4,4);
        $this->assertSame(12, $this->checker->check($roll, Checker::TRIPLES));
        $roll = array(5,1,5,2,5);
        $this->assertSame(15, $this->checker->check($roll, Checker::TRIPLES));
        $roll = array(6,6,1,2,6);
        $this->assertSame(18, $this->checker->check($roll, Checker::TRIPLES));
        $roll = array(1,1,4,2,3);
        $this->assertSame(0, $this->checker->check($roll, Checker::TRIPLES));
    }
    public function testQuadruples ()
    {

        $roll = array(1,1,1,1,3);
        $this->assertSame(4, $this->checker->check($roll, Checker::QUADRUPLES));
        $roll = array(1,2,2,2,2);
        $this->assertSame(8, $this->checker->check($roll, Checker::QUADRUPLES));
        $roll = array(3,3,3,2,3);
        $this->assertSame(12, $this->checker->check($roll, Checker::QUADRUPLES));
        $roll = array(4,4,1,4,4);
        $this->assertSame(16, $this->checker->check($roll, Checker::QUADRUPLES));
        $roll = array(5,5,5,2,5);
        $this->assertSame(20, $this->checker->check($roll, Checker::QUADRUPLES));
        $roll = array(6,6,6,2,6);
        $this->assertSame(24, $this->checker->check($roll, Checker::QUADRUPLES));
        $roll = array(1,1,1,2,3);
        $this->assertSame(0, $this->checker->check($roll, Checker::QUADRUPLES));
        $roll = array(5,5,5,5,5);
        $this->assertSame(20, $this->checker->check($roll, Checker::QUADRUPLES));
    }

}