<?php


use PHPUnit\Framework\TestCase;

require _DIR_ . "/../app/Models/User.php"; 


class UserTest extends TestCase
{
   public function testThatWeCanGetUserFirstName() {

        $user = new \App\Models\User; //new instance of class

        $user->setFirstName('Risto');

        $this->assertEquals($user->getFirstName(), 'Risto');

   }

   public function testThatWeCanGetUserLastName() {

        $user = new \App\Models\User; //new instance of class

        $user->setLastName('Tõldsep');

        $this->assertEquals($user->getLastName(), 'Tõldsep');

   }

   public function testFullNameIsReturned() {
        $user = new \App\Models\User; //new instance of class User

        $user->setFirstName('Risto');
        $user->setLastName('Tõldsep');

        $this->assertEquals($user->getFullName(), 'Risto Tõldsep');

   }
   
   public function testFirstAndLastNameAreTrimmed() {
        $user = new \App\Models\User; //new instance of class User

        $user->setFirstName('  Risto      ');
        $user->setLastName('  Tõldsep  ');

        $this->assertEquals($user->getFirstName(), 'Risto');
        $this->assertEquals($user->getLastName(), 'Tõldsep');
   }

   public function testEmailAddressCanBeSet() {

        $email = "ristotoldsep@gmail.com";

        $user = new \App\Models\User; //new instance of class User

        $user->setEmail($email);

        $this->assertEquals($user->getEmail(), $email);

   }

   public function testEmailVariablesContainCorrectValues() {
        $user = new \App\Models\User; //new instance of class User

        $user->setFirstName('Risto');
        $user->setLastName('Tõldsep');
        $user->setEmail('ristotoldsep@gmail.com');

        $emailVariables = $user->getEmailVariables(); //Returns an array

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Risto Tõldsep');
        $this->assertEquals($emailVariables['email'], 'ristotoldsep@gmail.com');
   }
}
