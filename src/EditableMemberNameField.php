<?php

namespace NSWDPC\UserForms\MemberField;

use SilverStripe\UserForms\Model\EditableFormField\EditableTextField;
use SilverStripe\Security\Security;

/**
 *
 * A userform field, default value being a member's name
 * The member can change the value
 * If a default value is present, that will be honoured
 * @author James
 *
 */
class EditableMemberNameField extends EditableTextField
{

    /**
     * Option to use Member::getTitle()
     */
    private static $use_title = false;

    /**
     * @var string
     */
    private static $singular_name = 'Member Name Field';

    /**
     * @var string
     */
    private static $plural_name = 'Member Name Fields';

    /**
     * @var string
     */
    private static $table_name = 'EditableMemberNameField';

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
        if($member && $member->exists()) {
            if($this->config()->get('use_title')) {
                $defaultValue = $member->getTitle();
            } else {
                $defaultValue = $member->getName();
            }
        }

        $field = $field->setValue($defaultValue);
        return $field;
    }
}
