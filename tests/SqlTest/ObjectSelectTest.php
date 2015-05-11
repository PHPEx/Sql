<?php
namespace SqlTest;

use Sql\Select\ObjectSelect as Select;

class ObjectSelectTest extends \PHPUnit_Framework_TestCase {
   
    private $object;
    public function setUp()
    {
     
    }
    
    public function testNoParams(){
       $sel = new Select();
       $sel->setTable('users')->where();
       $this->assertEquals('SELECT * FROM users',$sel->getQuery());
    }
    
    public function tearDown(){
      
    }
}
