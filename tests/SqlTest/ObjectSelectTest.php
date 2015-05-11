<?php
namespace SqlTest;

use Sql\Select\ObjectSelect as Select;

class ObjectSelectTest extends \PHPUnit_Framework_TestCase {
   
    private $object;
    public function setUp()
    {
        $this->object = new Select();
    }
    
    public function testTrue(){
        $this->assertTrue(true);
    }
    
    public function tearDown(){
        $this->object = null;
    }
}
