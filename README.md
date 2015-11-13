![logo](http://eden.openovate.com/assets/images/cloud-social.png) Eden Validation
====
[![Build Status](https://api.travis-ci.org/Eden-PHP/Validation.svg)](https://travis-ci.org/Eden-PHP/Validation)
====

 - [Install](#install)
 - [Introduction](#intro)
 - [API](#api)
    - [isType](#isType)
    - [greaterThan](#greaterThan)
    - [greaterThanEqualTo](#greaterThanEqualTo)
    - [lessThan](#lessThan)
    - [lessThanEqualTo](#lessThanEqualTo)
    - [lengthGreaterThan](#lengthGreaterThan)
    - [lengthGreaterThanEqualTo](#lengthGreaterThanEqualTo)
    - [lengthLessThan](#lengthLessThan)
    - [lengthLessThanEqualTo](#lengthLessThanEqualTo)
    - [notEmpty](#notEmpty)
    - [startsWithLetter](#startsWithLetter)
    - [alphaNumeric](#alphaNumeric)
    - [alphaNumericUnderScore](#alphaNumericUnderScore)
    - [alphaNumericHyphen](#alphaNumericHyphen)
    - [alphaNumericLine](#alphaNumericLine)
    - [set](#set)
 - [Contributing](#contributing)

====

<a name="install"></a>
## Install

`composer install eden/validation`

====

<a name="intro"></a>
## Introduction

Instantiate validation in this manner.

```
$validation = eden('validation', 'foobar');
```

====

<a name="api"></a>
## API

==== 

<a name="isType"></a>

### isType

Returns true if the value is a given type 

#### Usage

```
eden('validation', 'foo')->isType(*string $type, bool $soft);
```

#### Parameters

 - `*string $type` - The data type to check for
 - `bool $soft` - This is like == vs ===

Returns `bool`

#### Example

*Example 1*

```
eden('validation', 'foo')->isType('email');
```

*Example 2*

```
eden('validation', 'foo')->isType('url');
```

*Example 3*

```
eden('validation', 'foo')->isType('hex');
```

*Example 4*

```
eden('validation', 'foo')->isType('cc');
```

*Example 5*

```
eden('validation', 'foo')->isType('int');
```

*Example 6*

```
eden('validation', 'foo')->isType('float');
```

*Example 7*

```
eden('validation', 'foo')->isType('bool');
```

==== 

<a name="greaterThan"></a>

### greaterThan

Returns true if the value is greater than the passed argument 

#### Usage

```
eden('validation', 'foo')->greaterThan(*int $number);
```

#### Parameters

 - `*int $number` - Number to test against

Returns `bool`

#### Example

```
eden('validation', 'foo')->greaterThan(123);
```

==== 

<a name="greaterThanEqualTo"></a>

### greaterThanEqualTo

Returns true if the value is greater or equal to than the passed argument 

#### Usage

```
eden('validation', 'foo')->greaterThanEqualTo(*int $number);
```

#### Parameters

 - `*int $number` - Number to test against

Returns `bool`

#### Example

```
eden('validation', 'foo')->greaterThanEqualTo(123);
```

==== 

<a name="lessThan"></a>

### lessThan

Returns true if the value is less than the passed argument 

#### Usage

```
eden('validation', 'foo')->lessThan(*int $number);
```

#### Parameters

 - `*int $number` - Number to test against

Returns `bool`

#### Example

```
eden('validation', 'foo')->lessThan(123);
```

==== 

<a name="lessThanEqualTo"></a>

### lessThanEqualTo

Returns true if the value is less than or equal the passed argument 

#### Usage

```
eden('validation', 'foo')->lessThanEqualTo(*int $number);
```

#### Parameters

 - `*int $number` - Number to test against

Returns `bool`

#### Example

```
eden('validation', 'foo')->lessThanEqualTo(123);
```

==== 

<a name="lengthGreaterThan"></a>

### lengthGreaterThan

Returns true if the value length is greater than the passed argument 

#### Usage

```
eden('validation', 'foo')->lengthGreaterThan(*int $number);
```

#### Parameters

 - `*int $number` - Number to test against

Returns `bool`

#### Example

```
eden('validation', 'foo')->lengthGreaterThan(123);
```

==== 

<a name="lengthGreaterThanEqualTo"></a>

### lengthGreaterThanEqualTo

Returns true if the value length is greater than or equal to the passed argument 

#### Usage

```
eden('validation', 'foo')->lengthGreaterThanEqualTo(*int $number);
```

#### Parameters

 - `*int $number` - Number to test against

Returns `bool`

#### Example

```
eden('validation', 'foo')->lengthGreaterThanEqualTo(123);
```

==== 

<a name="lengthLessThan"></a>

### lengthLessThan

Returns true if the value length is less than the passed argument 

#### Usage

```
eden('validation', 'foo')->lengthLessThan(*int $number);
```

#### Parameters

 - `*int $number` - Number to test against

Returns `bool`

#### Example

```
eden('validation', 'foo')->lengthLessThan(123);
```

==== 

<a name="lengthLessThanEqualTo"></a>

### lengthLessThanEqualTo

Returns true if the value length is less than or equal to the passed argument 

#### Usage

```
eden('validation', 'foo')->lengthLessThanEqualTo(*int $number);
```

#### Parameters

 - `*int $number` - Number to test against

Returns `bool`

#### Example

```
eden('validation', 'foo')->lengthLessThanEqualTo(123);
```

==== 

<a name="notEmpty"></a>

### notEmpty

Returns true if the value is not empty 

#### Usage

```
eden('validation', 'foo')->notEmpty();
```

#### Parameters

Returns `bool`

==== 

<a name="startsWithLetter"></a>

### startsWithLetter

Returns true if the value starts with a specific letter 

#### Usage

```
eden('validation', 'foo')->startsWithLetter();
```

#### Parameters

Returns `bool`

==== 

<a name="alphaNumeric"></a>

### alphaNumeric

Returns true if the value is alpha numeric 

#### Usage

```
eden('validation', 'foo')->alphaNumeric();
```

#### Parameters

Returns `bool`

==== 

<a name="alphaNumericUnderScore"></a>

### alphaNumericUnderScore

Returns true if the value is alpha numeric underscore 

#### Usage

```
eden('validation', 'foo')->alphaNumericUnderScore();
```

#### Parameters

Returns `bool`

==== 

<a name="alphaNumericHyphen"></a>

### alphaNumericHyphen

Returns true if the value is alpha numeric hyphen 

#### Usage

```
eden('validation', 'foo')->alphaNumericHyphen();
```

#### Parameters

Returns `bool`

==== 

<a name="alphaNumericLine"></a>

### alphaNumericLine

Returns true if the value is alpha numeric hyphen or underscore 

#### Usage

```
eden('validation', 'foo')->alphaNumericLine();
```

#### Parameters

Returns `bool`

==== 

<a name="set"></a>

### set

Sets the value to be validated 

#### Usage

```
eden('validation', 'foo')->set(*mixed $value);
```

#### Parameters

 - `*mixed $value` - value

Returns `Eden\Validation\Index`

#### Example

```
eden('validation', 'foo')->set($value);
```

==== 

<a name="contributing"></a>
#Contributing to Eden

Contributions to *Eden* are following the Github work flow. Please read up before contributing.

##Setting up your machine with the Eden repository and your fork

1. Fork the repository
2. Fire up your local terminal create a new branch from the `v4` branch of your 
fork with a branch name describing what your changes are. 
 Possible branch name types:
    - bugfix
    - feature
    - improvement
3. Make your changes. Always make sure to sign-off (-s) on all commits made (git commit -s -m "Commit message")

##Making pull requests

1. Please ensure to run `phpunit` before making a pull request.
2. Push your code to your remote forked version.
3. Go back to your forked version on GitHub and submit a pull request.
4. An Eden developer will review your code and merge it in when it has been classified as suitable.