<?php

class ViewsTest extends PHPUnit_Framework_TestCase {

  /**
   * Test that a given condition is met.
   *
   * @return void
   */
  public function testSomethingIsTrue() {
    $this->assertTrue(true);  
  }

# Calling a controller:
#  $response = Controller::call('home@index', $parameters);

# Resolving an instance of a controller from a test:
#  $controller = Controller::resolve('application', 'home@index');

/*
- Company should respond to:
    - Name
    - Description
    - Address
    - Telephone
    - Email
    - Website
    - deleted
*/
  public function testIndex() {
    
  }

}