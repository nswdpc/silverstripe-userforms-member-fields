<?php

namespace NSWDPC\UserForms\MemberField;

use SilverStripe\UserForms\Model\EditableFormField\EditableTextField;
use SilverStripe\Security\Security;

/**
 *
 * A userform field, default value being a member's surname
 * The member can change the value
 * If a default value is present, that will be honoured
 * @author James
 *
 */
class EditableMemberSurnameField extends EditableTextField
{

    private static string $singular_name = 'Member Surname Field';

    private static string $plural_name = 'Member Surname fields';

    private static string $table_name = 'EditableMemberSurnameField';

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
            $defaultValue = $member->Surname;
        }
        return $field->setValue($defaultValue);
    }
}
