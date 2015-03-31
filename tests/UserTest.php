<?php

class UserTest extends PHPUnit_Framework_TestCase
{

    public function testShouldNotGetOtherUsersThanTeachers()
    {
        $u = new \models\User;
        $studentUsername = 'stu001';

        $assertion = $u->getUserByUsername($studentUsername);

        $this->assertNull($assertion);

    }
}