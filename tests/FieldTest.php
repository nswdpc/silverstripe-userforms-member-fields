<?php

namespace NSWDPC\UserForms\MemberField\Tests;

use NSWDPC\UserForms\MemberField\EditableMemberEmailField;
use NSWDPC\UserForms\MemberField\EditableMemberNameField;
use NSWDPC\UserForms\MemberField\EditableMemberFirstNameField;
use NSWDPC\UserForms\MemberField\EditableMemberSurnameField;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextField;
use SilverStripe\Security\Member;
use SilverStripe\Security\Security;


/**
 * Test field handling and defaults
 * @author James
 */
class FieldTest extends SapphireTest {

    protected $usesDatabase = false;

    private function getTestMember() {
        $member = Member::create([
            'Email' => 'formuser@example.com',
            'FirstName' => 'Form',
            'Surnane' => 'O\'User'
        ]);
        return $member;
    }

    public function testEmailField() {
        $member = $this->getTestMember();
        Security::setCurrentUser( $member );
        $field = EditableMemberEmailField::create();
        $formField = $field->getFormField();
        $this->assertTrue($field instanceof EmailField);
        $this->assertEquals( $member->Email, $field->Value());
    }
}