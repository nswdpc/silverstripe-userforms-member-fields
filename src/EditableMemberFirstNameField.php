<?php

namespace NSWDPC\UserForms\MemberField;

use SilverStripe\UserForms\Model\EditableFormField\EditableTextField;
use SilverStripe\Security\Security;

/**
 *
 * A userform field, default value being a member's first name
 * The member can change the value
 * If a default value is present, that will be honoured
 * @author James
 *
 */
class EditableMemberFirstNameField extends EditableTextField
{

    /**
     * @var string
     */
    private static $singular_name = 'Member Firstname Field';

    /**
     * @var string
     */
    private static $plural_name = 'Member Firstname Fields';

    /**
     * @var string
     */
    private static $table_name = 'EditableMemberFirstNameField';

    /**
     * @return FormField
     */
    public function getFormField()
    {
        $field = parent::getFormField();

        if($this->Default) {
            return $field;
        }

        $member = Security::getCurrentUser();
        $defaultValue = '';
        if($member) {
            $defaultValue = $member->FirstName;
        }

        $field = $field->setValue($defaultValue);
        return $field;
    }
}
