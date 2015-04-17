[![Build Status](https://travis-ci.org/Sleepness/UberFrontendValidationBundle.svg?branch=develop)](https://travis-ci.org/Sleepness/UberFrontendValidationBundle)  [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Sleepness/UberFrontendValidationBundle/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/Sleepness/UberFrontendValidationBundle/?branch=develop)  [![SensioLabsInsight](https://insight.sensiolabs.com/projects/2687b250-1218-45b1-ab40-83eb99c5865f/mini.png)](https://insight.sensiolabs.com/projects/2687b250-1218-45b1-ab40-83eb99c5865f)

SleepnessUberFrontendValidationBundle
=====================

This Bundle is a powerful tool to provide a client side validation of form data.

Introduction
------------

### Separation of concern

Symfony2 provides a powerful tool for server side validation.
This bundle provides a tool to make your app more secured by converting Symfony2 server side rules
into friendly client side validation.

### Symfony compatibility

This bundle works on any Symfony 2.0+ version.

### Features

This bundle supports the following constraints:

Basic Constraints:
- NotBlank
- Blank
- NotNull
- Null
- True
- False

String Constraints:
- Email
- Length
- Url

Comparison Constraint:
- EqualTo
- NotEqualTo

Date Constraint:
- DateTime
- Date

File Constraints:
- File
- Image


SleepnessUberFrontendValidationBundle supports:
- translating constraint messages, defined in message option of constraint;
- "validation groups" for organizing constraints.

Documentation
-------------

The bulk of the documentation for installation and configuration is stored in the [`Resources/doc/index.md`](https://github.com/Sleepness/UberFrontendValidationBundle/blob/develop/Resources/doc/index.md) file in this bundle.

Contributing
------------

Pull requests are welcome.

License
-------

See the complete license in the bundle: [`Resources/meta/LICENSE`](https://github.com/Sleepness/UberFrontendValidationBundle/blob/develop/Resources/meta/LICENSE).
