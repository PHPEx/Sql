<?php
namespace SqlTest;
require './../../vendor/autoload.php';
use Sql\Select\Object as Select;

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
