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
}
