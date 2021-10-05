# Member fields for user forms in Silverstripe

This module adds a few useful fields to collect default member information within [Silverstripe userforms](https://github.com/silverstripe/silverstripe-userforms).

+ Email field - default to the signed-in member's email address
+ Name field - default to the signed-in member's name (or title)
+ FirstName field - default to the signed-in member's firstname
+ Surname field - default to the signed-in member's surname

The goal of the fields is to help signed in users complete user forms without having to re-enter their details, with the following caveats:

1. If a default value is added for the field in the field editor, that will be respected.
2. The person completing the field can override the default value provided.

## Installation

```shell
composer require nswdpc/silverstripe-userforms-member-fields
```

## License

[BSD-3-Clause](./LICENSE.md)

## Documentation

For the member name field, set the `use_title` config value to `true` to use the value returned from `Member::getTitle()` as the default field value.

## Maintainers

+ [dpcdigital@NSWDPC:~$](https://dpc.nsw.gov.au)

## Security

If you have found a security issue with this module, please email digital[@]dpc.nsw.gov.au in the first instance, detailing your findings.

## Bugtracker

We welcome bug reports, pull requests and feature requests on the Github Issue tracker for this project.

Please review the [code of conduct](./code-of-conduct.md) prior to opening a new issue.

## Development and contribution

If you would like to make contributions to the module please ensure you raise a pull request and discuss with the module maintainers.

Please review the [code of conduct](./code-of-conduct.md) prior to completing a pull request.
