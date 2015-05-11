<?php
namespace SqlTest;

use Sql\Select\ObjectSelect as Select;
use Sql\Select\Parameters\Field;
use Sql\Select\Parameters\Equals;
use Sql\Select\Parameters\Value;

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
    public function testEqualsParams(){
       $sel = new Select();
       $sel->setTable('users')->where(new Equals(new Field('id'),new Value(10)));
       $this->assertEquals("SELECT * FROM users WHERE (id = '10')",$sel->getQuery());
    }
    
    public function tearDown(){
      
    }
}
