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
    private static bool $use_title = false;

    private static string $singular_name = 'Member Name Field';

    private static string $plural_name = 'Member Name Fields';

    private static string $table_name = 'EditableMemberNameField';

    #[\Override]
    public function getFormField()
    {
        $field = parent::getFormField();

        if ($this->Default) {
            return $field;
        }

        $member = Security::getCurrentUser();
        $defaultValue = '';
        if ($member) {
            $defaultValue = $this->config()->get('use_title') ? $member->getTitle() : $member->getName();
        }

        return $field->setValue($defaultValue);
    }
}
