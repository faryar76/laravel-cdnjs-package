# laravel-cdnjs-package
![logo](https://github.com/faryar76/laravel-cdnjs-package/blob/master/simple.png)

<a href="https://scrutinizer-ci.com/g/faryar76/laravel-cdnjs-package"><img src="https://img.shields.io/scrutinizer/g/faryar76/laravel-cdnjs-package.svg?style=round-square" alt="Quality Score"></img></a>
[![code coverage](https://codecov.io/gh/faryar76/laravel-cdnjs-package/branch/master/graph/badge.svg)](https://codecov.io/gh/faryar76/laravel-cdnjs-package)
[![Maintainability](https://api.codeclimate.com/v1/badges/9d6be7b057103cb14410/maintainability)](https://codeclimate.com/github/faryar76/laravel-cdnjs-package/maintainability)
[![Build Status](https://travis-ci.org/faryar76/laravel-cdnjs-package.svg?branch=master)](https://travis-ci.org/faryar76/laravel-cdnjs-package)
[![Code Coverage](https://scrutinizer-ci.com/g/faryar76/laravel-cdnjs-package/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/faryar76/laravel-cdnjs-package/?branch=master)
[![StyleCI](https://github.styleci.io/repos/139709518/shield?branch=master)](https://github.styleci.io/repos/139709518)
[![Latest Stable Version](https://poser.pugx.org/imanghafoori/laravel-cdnjs-package/v/stable)](https://packagist.org/packages/imanghafoori/laravel-cdnjs-package)
[![Daily Downloads](https://poser.pugx.org/imanghafoori/laravel-cdnjs-package/d/daily)](https://packagist.org/packages/imanghafoori/laravel-cdnjs-package)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=round-square)](LICENSE.md)



__[laravel faryar/cdnjs ](https://packagist.org/packages/faryar/cdnjs)__ is a laravel blade package for 
fast and cleaner laravel programming.
## Description
 by using this package your app will get libraries from 
 [cdnjs.com](https://cdnjs.com) and save library link in storage for next time 
 <br />
 in the other words just in first time package will request to cdnjs for check package exists and get link
## installation 
#### no need config anything  install latest version with
```
composer require faryar/cdnjs

```
## usage
### in blade file 
```
@cdnjs('library_name')
@cdnjs('bootstrap.css')
@cdnjs('jquery.js')
@cdnjs('jquery.min.js')
or use array
@cdnjs(['jquery.min.js','bootstrap.css','select2.js,'vue.js'])
```

#### output for js
```
<script src="library address"></script>
```
#### output for css
```
 <link rel="stylesheet" href="library address" />
````

TODO
- [x] support auto laod to laravel provider 
- [x] array support
- [ ] detect local libraries
- [ ] create new config file
- [ ] select version of library
- [ ] download libraries offline of library
