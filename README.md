# laravel-cdnjs-package
![logo](https://github.com/faryar76/laravel-cdnjs-package/blob/master/simple.png)

[![Daily Downloads](https://poser.pugx.org/faryar76/laravel-cdnjs-package/d/daily)](https://packagist.org/packages/faryar/cdnjs)
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
