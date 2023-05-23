<?php

namespace JonoM\EnvironmentAwareness;

use SilverStripe\Core\Config\Configurable;
use SilverStripe\Core\Environment;
use SilverStripe\Security\Member;
use SilverStripe\Security\Permission;
use SilverStripe\Security\Security;
use SilverStripe\View\TemplateGlobalProvider;

/**
 * Additional functions to be available in all templates.
 */
class EnvironmentAwareness implements TemplateGlobalProvider
{
    use Configurable;

    public const ENV_LABEL = 'SS_ENVIRONMENT_LABEL';

    public static function getEnvironments()
    {
        $envs = self::config()->get('environments');
        // Legacy fallback
        if (!$envs) {
            $envs = Config::inst()->get('EnvironmentAwareness', 'environments');
        }
        
        return $envs;
    }

    public static function EnvironmentLabel()
    {
        return Environment::getEnv(self::ENV_LABEL);
    }

    public static function getEnvironmentProp($prop, $fallback = null)
    {
        $label = self::EnvironmentLabel();

        if (!$label) {
            return false;
        }
        $envs = self::getEnvironments();
        if (!array_key_exists($label, $envs) || !array_key_exists($prop, $envs[$label])) {
            return $fallback;
        }

        return $envs[$label][$prop];
    }

    public static function EnvironmentShortLabel()
    {
        $shortLabel = self::getEnvironmentProp('short_label');
        if (!$shortLabel && $label = self::EnvironmentLabel()) {
            $shortLabel = substr($label, 0, 1);
        }

        return $shortLabel;
    }

    public static function EnvironmentDescription()
    {
        return self::getEnvironmentProp('description');
    }

    public static function EnvironmentColor()
    {
        return self::getEnvironmentProp('color', '#cccccc');
    }

    public static function ShowEnvironmentNotice()
    {
        if (!self::EnvironmentLabel() || !Permission::check("CMS_ACCESS")) {
            return false;
        }
        $members = self::config()->get('Members');
        // If no specific members are set, show to all CMS users
        if (!$members) {
            return true;
        }
        // Otherwise only show to indicated members
        $member = Security::getCurrentUser();
        $identifierField = Member::config()->get('unique_identifier_field');

        return $member && is_array($members) && in_array($member->{$identifierField}, $members);
    }

    public static function get_template_global_variables()
    {
        return array(
            'EnvironmentLabel',
            'EnvironmentShortLabel',
            'EnvironmentColor',
            'EnvironmentDescription',
            'ShowEnvironmentNotice'
        );
    }
}
