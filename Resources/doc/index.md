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

### Step 3: Configure twig to make sure that you are using proper form theming, and that files with constraints exists

```yml
twig:
  // some other options
  globals:
    web_path: "%kernel.root_dir%/../web"
  form_themes:
    - 'SleepnessUberFrontendValidationBundle:Form:fields.html.twig'
```

### Step 4: Proper displaying of form

Your twig template with form may look like this

```html

{{ validation_init(form) }}

<form method="post" {{form_enctype(form)}} >
    {{ form_widget(form) }}
    <button type="submit" class="form_submit_button">Save</button>
</form>
```

### Additional:

1) If you want to disable validation for some reasons you need only to remove `form_themes` property from Twig configuration

2) If you want to override styles, or some script parts, you can override `SleepnessUberFrontendValidation::form_validation.html.twig` template.

3) If you want to disable client validation only for few forms, you can not call twig function `{{ validation_init(form) }}` for that form

#### Note.
1) If you create submit button using form builder, - you are safe, else, - add `class="form_submit_button"` attribute to your form's submitting field.

2) DateTime validator works only if your choose `single_text` widget for it, e.g. in your FormType
`->add('date', 'datetime', ['widget' => 'single_text'])` (for Date validator this rule work too)

to be continue...
