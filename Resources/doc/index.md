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
to be continue...
