<?php

namespace NSWDPC\UserForms\MemberField;

use SilverStripe\UserForms\Model\EditableFormField\EditableEmailField;
use SilverStripe\Security\Security;

/**
 *
 * A userform field, default value being a member's email address
 * The member can change the email address value
 * If a default value is present, that will be honoured
 * @author James
 *
 */
class EditableMemberEmailField extends EditableEmailField
{

    /**
     * @var string
     */
    private static $singular_name = 'Member Email Field';

    /**
     * @var string
     */
    private static $plural_name = 'Member Email Fields';

    /**
     * @var string
     */
    private static $table_name = 'EditableMemberEmailField';

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
            $defaultValue = $member->Email;
        }
        $field->setValue($defaultValue);
        return $field;
    }
}
