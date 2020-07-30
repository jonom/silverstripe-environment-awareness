# Troubleshooting

## No notice in CMS

If you're using a module like *Grouped CMS Menu* that supplies a `LeftAndMain_Menu.ss` template, you may need to duplicate their version of the template in to your theme templates, and add `<% include JonoM\\EnvironmentAwareness\\LeftAndMain_Environment %>` to it.
