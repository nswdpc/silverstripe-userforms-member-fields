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
            'Surname' => 'O\'User'
        ]);
        return $member;
    }

    /**
     * Verify Email field handles Member Email if it exists
     */
    public function testEmailField() {
        $member = $this->getTestMember();
        Security::setCurrentUser( $member );
        $field = EditableMemberEmailField::create();
        $formField = $field->getFormField();
        $this->assertTrue($formField instanceof EmailField, "FormField is not an EmailField");
        $this->assertEquals( $member->Email, $formField->Value(), "Value does not equal Member Email");
    }

    /**
     * Verify FirstName field handles Member Email if it exists
     */
    public function testFirstNameField() {
        $member = $this->getTestMember();
        Security::setCurrentUser( $member );
        $field = EditableMemberFirstNameField::create();
        $formField = $field->getFormField();
        $this->assertTrue($formField instanceof TextField, "FormField is not an TextField");
        $this->assertEquals( $member->FirstName, $formField->Value(), "Value does not equal Member FirstName");
    }

    /**
     * Verify Surname field handles Member Email if it exists
     */
    public function testSurnameField() {
        $member = $this->getTestMember();
        Security::setCurrentUser( $member );
        $field = EditableMemberSurnameField::create();
        $formField = $field->getFormField();
        $this->assertTrue($formField instanceof TextField, "FormField is not an TextField");
        $this->assertEquals( $member->Surname, $formField->Value(), "Value does not equal Member Surname");
    }

    /**
     * Verify Name field handles name/title of member
     */
    public function testNameField() {
        $member = $this->getTestMember();
        Security::setCurrentUser( $member );

        $field = EditableMemberNameField::create();

        $useTitle = $field->config()->get('use_title');

        // test name
        $field->config()->update('use_title', false);
        $formField = $field->getFormField();
        $this->assertTrue($formField instanceof TextField, "FormField is not an TextField");
        $this->assertEquals( $member->getName(), $formField->Value(), "Value does not equal Member Name");

        // test title
        $field->config()->update('use_title', true);
        $formField = $field->getFormField();
        $this->assertEquals( $member->getTitle(), $formField->Value(), "Value does not equal Member Title");

        $field->config()->update('use_title', $useTitle);
    }

    /**
     * Verify default value handling for email field
     */
    public function testEmailFieldDefaultValue() {
        $defaultValue = 'testEmailField';
        $member = $this->getTestMember();
        Security::setCurrentUser( $member );
        $field = EditableMemberEmailField::create();
        $field->Default = $defaultValue;
        $formField = $field->getFormField();
        $this->assertTrue($formField instanceof EmailField, "FormField is not an EmailField");
        $this->assertEquals( $defaultValue, $formField->Value(), "Value does not equal default value");
    }

    /**
     * Verify FirstName field handles default value
     */
    public function testFirstNameFieldDefaultValue() {
        $defaultValue = 'testFirstNameField';
        $member = $this->getTestMember();
        Security::setCurrentUser( $member );
        $field = EditableMemberFirstNameField::create();
        $field->Default = $defaultValue;
        $formField = $field->getFormField();
        $this->assertTrue($formField instanceof TextField, "FormField is not an TextField");
        $this->assertEquals( $defaultValue, $formField->Value(), "Value does not equal default value");
    }

    /**
     * Verify Surname field handles default value
     */
    public function testSurnameFieldDefaultValue() {
        $defaultValue = 'testSurnameField';
        $member = $this->getTestMember();
        Security::setCurrentUser( $member );
        $field = EditableMemberSurnameField::create();
        $field->Default = $defaultValue;
        $formField = $field->getFormField();
        $this->assertTrue($formField instanceof TextField, "FormField is not an TextField");
        $this->assertEquals( $defaultValue, $formField->Value(), "Value does not equal default value");
    }

    /**
     * Verify Name field handles default value
     */
    public function testNameFieldDefaultValue() {
        $defaultValue = 'testNameField';

        $member = $this->getTestMember();
        Security::setCurrentUser( $member );

        $field = EditableMemberNameField::create();
        $field->Default = $defaultValue;

        $useTitle = $field->config()->get('use_title');

        // test name
        $field->config()->update('use_title', false);
        $formField = $field->getFormField();
        $this->assertTrue($formField instanceof TextField, "FormField is not an TextField");
        $this->assertEquals( $defaultValue, $formField->Value(), "Value does not equal default value");

        // test title
        $field->config()->update('use_title', true);
        $formField = $field->getFormField();
        $this->assertEquals( $defaultValue, $formField->Value(), "Value does not equal default value");

        $field->config()->update('use_title', $useTitle);
    }
}
