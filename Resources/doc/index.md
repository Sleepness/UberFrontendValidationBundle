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

### Step 3: Configure Twig for proper form theming and checking existence of constraint files

```yml
twig:
  // some other options
  form_themes:
    - 'SleepnessUberFrontendValidationBundle:Form:fields.html.twig'
```

### Step 4: Proper displaying of form

In main layout enable forms validation:

```html
{{ validation_init(form) }}

```

Then you form may look like this^

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

3) If you want to make validate forms loaded by ajax, only what you need is to render form like described above with {{ validation_init() }} function.

4) If you assign some validation group to form type, and print some field that doesn't belong to the given group you will be surprised that validated will be only fields of given group,
   but it works only when only single group assigned to form. (need to do in future)

#### Notes:

1) If you create submit button using form builder, - you are safe, else, - add `class="form_submit_button"` attribute to your form's submitting field.

2) DateTime validator works only if your choose `single_text` widget for it, e.g. in your FormType
`->add('date', 'datetime', ['widget' => 'single_text'])` (for Date validator this rule works too).

to be continue...
