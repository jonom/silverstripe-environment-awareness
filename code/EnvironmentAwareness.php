<?php

/**
 * Additional functions to be available in all templates.
 */
class EnvironmentAwareness implements TemplateGlobalProvider
{
    public static function getEnvironments()
    {
        return Config::inst()->get('EnvironmentAwareness', 'environments');
    }

    public static function EnvironmentLabel()
    {
        if (!defined('SS_ENVIRONMENT_LABEL')) return false;
        return SS_ENVIRONMENT_LABEL;
    }

    public static function LeftMenuEnvironmentLabel()
    {
        $label = self::EnvironmentLabel();
        if (!$label) return false;
        $html = substr($label,0,1) . '<span class="tail">' . substr($label,1) . '</span>';
        return DBField::create_field('HTMLText', $html);
    }

    public static function EnvironmentDescription()
    {
        if (!defined('SS_ENVIRONMENT_LABEL')) return false;
        $envs = self::getEnvironments();
        if (!array_key_exists(SS_ENVIRONMENT_LABEL, $envs) || !array_key_exists('description', $envs[SS_ENVIRONMENT_LABEL])) return '#cccccc';
        return $envs[SS_ENVIRONMENT_LABEL]['description'];
    }

    public static function EnvironmentColor()
    {
        if (!defined('SS_ENVIRONMENT_LABEL')) return false;
        $envs = self::getEnvironments();
        if (!array_key_exists(SS_ENVIRONMENT_LABEL, $envs) || !array_key_exists('color', $envs[SS_ENVIRONMENT_LABEL])) return '#cccccc';
        return $envs[SS_ENVIRONMENT_LABEL]['color'];
    }

    public static function ShowEnvironmentNotice()
    {
        if (!Permission::check("CMS_ACCESS")) return false;
        $members = Config::inst()->get('EnvironmentAwareness', 'Members');
        // If no specific members are set, show to all CMS users
        if (!$members) return true;
        // Otherwise only show to indicated members
        $member = Member::currentUser();
        $identifierField = Member::config()->unique_identifier_field;
        return ($member && is_array($members)) ? in_array($member->{$identifierField}, $members) : false;
    }

    public static function get_template_global_variables()
    {
        return array(
            'EnvironmentLabel',
            'EnvironmentColor',
            'LeftMenuEnvironmentLabel',
            'EnvironmentDescription',
            'ShowEnvironmentNotice'
        );
    }
}
