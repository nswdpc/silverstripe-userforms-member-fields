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

    /**
     * @var string
     */
    private static $singular_name = 'Member Surname Field';

    /**
     * @var string
     */
    private static $plural_name = 'Member Surname fields';

    /**
     * @var string
     */
    private static $table_name = 'EditableMemberSurnameField';

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
            $defaultValue = $member->Surname;
        }

        $field = $field->setValue($defaultValue);
        return $field;
    }
}
