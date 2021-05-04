<?php


use PHPUnit\Framework\TestCase;

require _DIR_ . "/../app/Models/User.php"; 


class UserTest extends TestCase
{

    public function setUp() :void { //Added on later, to avoid always declaring user instance in each test, runs before each test function to reset things!

        // var_dump('1');

        $this->user = new \App\Models\User;
    
    }

    /** @test */    //Writing @test will use it with function, maybe more readable way to name the function
   public function that_we_can_get_user_first_name() {

        // $user = new \App\Models\User; //new instance of class

        $this->user->setFirstName('Risto');

        $this->assertEquals($this->user->getFirstName(), 'Risto');

   }

   public function testThatWeCanGetUserLastName() {

        $user = new \App\Models\User; //new instance of class, other way to use test!

        $user->setLastName('Tõldsep');

        $this->assertEquals($user->getLastName(), 'Tõldsep');

   }

   public function testFullNameIsReturned() {
        
        // $user = new \App\Models\User; //new instance of class User

        $this->user->setFirstName('Risto');
        $this->user->setLastName('Tõldsep');

        $this->assertEquals($this->user->getFullName(), 'Risto Tõldsep');

   }
   
   public function testFirstAndLastNameAreTrimmed() {
        // $user = new \App\Models\User; //new instance of class User

        $this->user->setFirstName('  Risto      ');
        $this->user->setLastName('  Tõldsep  ');

        $this->assertEquals($this->user->getFirstName(), 'Risto');
        $this->assertEquals($this->user->getLastName(), 'Tõldsep');
   }

   public function testEmailAddressCanBeSet() {

        $email = "ristotoldsep@gmail.com";

        // $user = new \App\Models\User; //new instance of class User

        $this->user->setEmail($email);

        $this->assertEquals($this->user->getEmail(), $email);

   }

   public function testEmailVariablesContainCorrectValues() {
        // $user = new \App\Models\User; //new instance of class User

        $this->user->setFirstName('Risto');
        $this->user->setLastName('Tõldsep');
        $this->user->setEmail('ristotoldsep@gmail.com');

        $emailVariables = $this->user->getEmailVariables(); //Returns an array

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Risto Tõldsep');
        $this->assertEquals($emailVariables['email'], 'ristotoldsep@gmail.com');
   }
}
