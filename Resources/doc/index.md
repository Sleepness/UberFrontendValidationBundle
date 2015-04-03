Getting Started With SleepnessUberFrontendValidationBundle
==================================

## Installation

### Step 1: Download bundle using composer

Add SleepnessUberFrontendValidationBundle by running the command:

``` bash
$ php composer.phar require sleepness/uber-frontend-validation-bundle "@dev"
```

Composer will install the bundle to your project's `vendor/sleepness` directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Sleepness\UberFrontendValidationBundle\SleepnessUberFrontendValidationBundle(),
    );
}
```

### Step 3: Add configuration

Configure Twig for proper form theming and checking existence of constraint files:

```yml
twig:
  # some other options
  form_themes:
    - 'SleepnessUberFrontendValidationBundle:Form:fields.html.twig'
```
If you want to use some asset minifier, firs you need to configure it.

Configure Assetic to minify included javascripts and stylesheets with [YUI Compressor](http://symfony.com/doc/current/cookbook/assetic/yuicompressor.html):

```yml
assetic:
    # some other options
    filters:
        yui_css:
            jar: "%kernel.root_dir%/Resources/java/yuicompressor.jar"
        yui_js:
            jar: "%kernel.root_dir%/Resources/java/yuicompressor.jar"
```

How configure Assetic with UglifyJS(UglifyCSS) read [here](http://symfony.com/doc/current/cookbook/assetic/uglifyjs.html).

### Step 4: Proper form displaying

In main layout enable forms validation:

```html
{{ validation_init() }}

```

Then your form may look like this:

```html
<form method="post" {{ form_enctype(form) }} >
    {{ form_widget(form) }}
    <button type="submit" class="form_submit_button">Save</button>
</form>
```

### Step 5: Check for using jQuery

Add `jQuery` to your project in one of the suitable [ways](http://jquery.com/download/).

### Additional:

1) If you want for some reasons to disable client side validation you need only to remove `form_themes` property from Twig configuration.

2) If you want to use some custom styles, or scripts, you have to override `SleepnessUberFrontendValidation::form_validation.html.twig` template.

3) Forms loaded by ajax will be validated too, just make sure that you enable `{{ validation_init() }}` function.

4) If you assign some validation group to form type, and print some field that doesn't belong to the given group you will be surprised that validated will be only fields of given group,
   but it works only when only single group assigned to form. (need to do in future)

#### Notes:

1) If you create submit button using form builder, - you are safe, else, - add `class="form_submit_button"` attribute to your form's submitting field.

2) DateTime validator works only if your choose `single_text` widget for it, e.g. in your FormType
`->add('date', 'datetime', ['widget' => 'single_text'])` (for Date validator this rule works too).
