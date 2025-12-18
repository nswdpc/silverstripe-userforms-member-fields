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

    private static string $singular_name = 'Member Firstname Field';

    private static string $plural_name = 'Member Firstname Fields';

    private static string $table_name = 'EditableMemberFirstNameField';

    #[\Override]
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
        return $field->setValue($defaultValue);
    }
}
