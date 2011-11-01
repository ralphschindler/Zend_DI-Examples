README
======

Bootstrapping
-------------

Each script will utilize the zf2bootstrap.dist.php file located in this directory.  If you want to override this file, simply copy it to `zf2bootstrap.php` in the current working directory, or inside of your configured `include_path`.

Most of the examples here build off of the "Movie and Lister" example
put forth by Martin Fowler in his post located at http://martinfowler.com/articles/injection.html.

Example Index
-------------

### Example 01 - Constructor Injection

Simple Constructor Injection.  Object obtained from the container by
using the class name.

[ ✍ source][01]

### Example 02 - Interface Injection

Interface Injection via runtime definition.

[ ✍ source][02]

### Example 03 - Setter Injection

Setter injection via runtime definition.  The setter method has to be marked as such so that the container knows that the setter is non-optional.

[ ✍ source][03]

### Example 04 - Configuration Parameters

Constructor injection with configuration parameters passed into the instance manager.

[ ✍ source][04]

### Example 05 - Call-time Parameters

Constructor injection with parameters passed into the containers `get()` method.

[ ✍ source][05]

### Example 06 - Setter Injection With Configuration

Setter injection with configuration. With this form of setter injection, the setter is originally optional, but since parameters that fulfill this method are passed into the configuration, the setter will be called.

[ ✍ source][06]

### Example 07 - Setter Injection With Call-time Parameters

setter-injection-with-calltime-params

[ ✍ source][07]

### Example 08 - Multiple Injections / Single Injection Point

The ability to inject objects/dependencies of the same type through a single injection point.  This is sometimes called re-injection.

[ ✍ source][08]

### Example 09 - Setter Injection With Annotation

Setter injection specified by an annotation.  By default, setters are identified but marked as optional. By using the Inject() annotation, this will mark the method as required.

[ ✍ source][09]

### Example 10 - Compiler Based Constructor Injection

Compiler based constructor injection

[ ✍ source][10]

### Example 11 - Compiler Based Interface Injection

Compiler based interface injection

[ ✍ source][11]

### Example 12 - Compiled Based Setter Injection With Annotation

Compiler based setter injection using annotations.

[ ✍ source][12]

### Example 13 - Closure based dependency

The ability to specific a method that can be called to satisfy a dependency.  This is useful when the dependency is not managed by the container, but perhaps by another container or some other outside system (service locator).

[ ✍ source][13]

### Example 14 - Disambiguation

When two methods have the same parameter signature, use the fully qualified name for the parameters instead of the given name.

[ ✍ source][14]

### Example 15 - Multiple Injection to Single Injection Point With Multiple Arguments

When a method must be called multiple times (sometimes called reinjection), and there are multiple values that need to be passed along with the dependency.

[ ✍ source][15]


[01]: https://github.com/ralphschindler/Zend_DI-Examples/blob/master/example-01.php 
[02]: https://github.com/ralphschindler/Zend_DI-Examples/blob/master/example-02.php 
[03]: https://github.com/ralphschindler/Zend_DI-Examples/blob/master/example-03.php 
[04]: https://github.com/ralphschindler/Zend_DI-Examples/blob/master/example-04.php 
[05]: https://github.com/ralphschindler/Zend_DI-Examples/blob/master/example-05.php 
[06]: https://github.com/ralphschindler/Zend_DI-Examples/blob/master/example-06.php 
[07]: https://github.com/ralphschindler/Zend_DI-Examples/blob/master/example-07.php 
[08]: https://github.com/ralphschindler/Zend_DI-Examples/blob/master/example-08.php 
[09]: https://github.com/ralphschindler/Zend_DI-Examples/blob/master/example-09.php 
[10]: https://github.com/ralphschindler/Zend_DI-Examples/blob/master/example-10.php 
[11]: https://github.com/ralphschindler/Zend_DI-Examples/blob/master/example-11.php 
[12]: https://github.com/ralphschindler/Zend_DI-Examples/blob/master/example-12.php 
[13]: https://github.com/ralphschindler/Zend_DI-Examples/blob/master/example-13.php 
[14]: https://github.com/ralphschindler/Zend_DI-Examples/blob/master/example-14.php 
[15]: https://github.com/ralphschindler/Zend_DI-Examples/blob/master/example-15.php 