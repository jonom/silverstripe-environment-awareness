# How to use Environment Awareness

## Configure your environments

1. Define a unique `SS_ENVIRONMENT_LABEL` [environmental variable](https://docs.silverstripe.org/en/4/getting_started/environment_management/) in each of your environments:
```env
SS_ENVIRONMENT_LABEL="Production"
```
2. Configure properties for each of these environments in your project config yml, grouped by their labels:
```yml
JonoM\EnvironmentAwareness\EnvironmentAwareness:
  environments:
    Development:
      short_label: 'DEV' # Used in CMS when side menu is collapsed
      color: '#f26522'
      description: 'Local development site'
    Production:
      short_label: 'PROD'
      color: '#00a651'
      description: 'Live website'
```
3. [Flush the config manifest](https://docs.silverstripe.org/en/4/developer_guides/execution_pipeline/manifests/#flushing)

**Tip:** The labels *'Development'*, *'Stage'* and *'Production'* have pre-defined colours and descriptions, so you can use these without additional configuration if you like.

__Note:__ Silverstripe has a concept of 'environment type' (`SS_ENVIRONMENT_TYPE`) which can be set to 'live', 'test' or 'dev'. This is more like a 'mode' than a type though, because there is nothing to stop you temporarily setting your production environment type to 'dev' to get some debugging information, or your development environment to 'live' to simulate production configuration locally. So you can't really on the environment type to know which server environment you're interacting with. `SS_ENVIRONMENT_LABEL` is intended to be a genuine constant, so you can have clarity about which environment you are working on.

## Include front-end environment notice

**Option 1:** Include the environment notice template at the top of the body in `Page.ss`:
```html
<% include JonoM\\EnvironmentAwareness\\EnvironmentNotice %>
```

**Option 2:** If you have [BetterNavigator](https://github.com/jonom/silverstripe-betternavigator) installed, you can augment that component by adding this include anywhere in the body of `Page.ss`:
```html
<% include JonoM\\EnvironmentAwareness\\BetterNavigator_Environment %>
```

## Only show notice to developers

If you only have two environments (local and live), you probably don't need all of your CMS users to see environment notices. You can indicate individual Members that should see the notices like so:
```yml
JonoM\EnvironmentAwareness\EnvironmentAwareness:
  Members:
    - developer1@yourcompany.com
    - developer2@yourcompany.com
```
