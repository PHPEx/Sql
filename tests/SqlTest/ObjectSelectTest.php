<?php
namespace SqlTest;

use Sql\Select\ObjectSelect as Select;
use Sql\Select\Parameters\Field;
use Sql\Select\Parameters\Equals;
use Sql\Select\Parameters\Value;
use Sql\Select\Parameters\In;
use Sql\Select\Parameters\GreaterThan;
use Sql\Select\Parameters\GreaterEquals;
use Sql\Select\Parameters\LesserThan;
use Sql\Select\Parameters\LesserEquals;
use Sql\Select\Parameters\Condition\AndCondition;
use Sql\Select\Parameters\Condition\OrCondition;

class ObjectSelectTest extends \PHPUnit_Framework_TestCase {
   
    private $object;
    public function setUp()
    {
     
    }
    
    public function testNoParams(){
        
       $sel = new Select();
       $sel->setTable('users');
       
       $this->assertEquals('SELECT * FROM users',$sel->getQuery());
    }
    
    public function testEqualsParams(){
        
       $sel = new Select();
       $sel->setTable('users')->where(new Equals(new Field('id'),new Value(10)));
       
       $this->assertEquals("SELECT * FROM users WHERE (id = '10')",$sel->getQuery());
    }
    
    public function testAndConditionAndEqualsParams(){
        
       $sel = new Select();
       $sel->setTable('users')->where(
               new AndCondition(
                       new Equals(new Field('username'),new Value('borodin')),
                       new Equals(new Field('password'),new Value('pass'))
                       )
               );
       
       $this->assertEquals("SELECT * FROM users WHERE (username = 'borodin' AND password = 'pass')",$sel->getQuery());
    }
    
    public function test4AndConditionAndEqualsParams(){
        
       $sel = new Select();
       $sel->setTable('users')->where(
              new AndCondition(
                       new AndCondition(
                       new Equals(new Field('username'),new Value('borodin')),
                       new Equals(new Field('password'),new Value('pass'))
                       ),
                       new AndCondition(
                       new Equals(new Field('username'),new Value('borodin')),
                       new Equals(new Field('password'),new Value('pass'))
                       )
                      )
               );
       
       $this->assertEquals("SELECT * FROM users WHERE (username = 'borodin' AND password = 'pass' AND username = 'borodin' AND password = 'pass')",$sel->getQuery());
    }
    
    public function testOrConditionAndEqualsParams(){
        
       $sel = new Select();
       $sel->setTable('users')->where(
               new OrCondition(
                       new Equals(new Field('username'),new Value('borodin')),
                       new Equals(new Field('password'),new Value('pass'))
                       )
               );
       
       $this->assertEquals("SELECT * FROM users WHERE (username = 'borodin' OR password = 'pass')",$sel->getQuery());
    }
    
    public function testInParams(){
        
       $sel = new Select();
       $sel->setTable('users')->where(
             new In(new Field('id'), array(1,2,3))
               );
       
       $this->assertEquals("SELECT * FROM users WHERE (id IN (1,2,3))",$sel->getQuery());
    }
    public function testLesserThanParams(){
        
       $sel = new Select();
       $sel->setTable('users')->where(
             new LesserThan(new Field('id'),new Value(10) )
               );
       
       $this->assertEquals("SELECT * FROM users WHERE (id < 10)",$sel->getQuery());
    }
    
    public function testLesserEqualsParams(){
        
       $sel = new Select();
       $sel->setTable('users')->where(
             new LesserEquals(new Field('id'),new Value(10) )
               );
       
       $this->assertEquals("SELECT * FROM users WHERE (id <= 10)",$sel->getQuery());
    }
    
    public function testGreaterThanParams(){
        
       $sel = new Select();
       $sel->setTable('users')->where(
             new GreaterThan(new Field('id'),new Value(10) )
               );
       
       $this->assertEquals("SELECT * FROM users WHERE (id > 10)",$sel->getQuery());
    }
    public function testGreaterEqualsParams(){
        
       $sel = new Select();
       $sel->setTable('users')->where(
             new GreaterEquals(new Field('id'),new Value(10) )
               );
       
       $this->assertEquals("SELECT * FROM users WHERE (id >= 10)",$sel->getQuery());
    }
    
    public function tearDown(){
      
    }
}
