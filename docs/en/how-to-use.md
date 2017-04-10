# How to use Environment Awareness

This module assumes you are using `_ss_environment.php` files for environment configuration.

## Configure your environments

1. Add a unique environment label to the `_ss_environment.php` file in each of your environments:
```php
define('SS_ENVIRONMENT_LABEL', 'Production');
```
2. Set a colour and description for each of your environments:
```yml
EnvironmentAwareness:
  environments:
    Development:
      color: '#f26522'
      description: 'Local development site'
    Production:
      color: '#00a651'
      description: 'Live website'
```
3. [Flush the config manifest](https://docs.silverstripe.org/en/3/developer_guides/execution_pipeline/manifests/#flushing)

**Tip:** The labels *'Development'*, *'Stage'* and *'Production'* have pre-defined colours and descriptions, so you can use these without additional configuration if you like.

__Note:__ SilverStripe has a concept of 'environment type' (`SS_ENVIRONMENT_TYPE`) which can be set to 'live', 'test' or 'dev'. This is more like a 'mode' than a type though, because there is nothing to stop you temporarily setting your production environment type to 'dev' to get some debugging information, or your development environment to 'live' to simulate production configuration locally. So you can't really on the environment type to know which server environment you're interacting with. `SS_ENVIRONMENT_LABEL` is intended to be a genuine constant, so you can have clarity about which environment you are working on.

## Include front-end environment notice

1. Include the environment notice template at the top of the page in `Page.ss`:
```html
<% include EnvironmentNotice %>
```
2. Include the Environment Awareness CSS file with other CSS files being combined together, or add this to your `Page_Controller::init()` method:
```php
Requirements::css('environment-awareness/css/environment-awareness.css');
```

## Only show notice to developers

If you only have two environments (local and live), you probably don't need all of your CMS users to see environment notices. You can indicate individual Members that should see the notices like so:
```yml
EnvironmentAwareness:
  Members:
    - developer1@yourcompany.com
    - developer2@yourcompany.com
```
