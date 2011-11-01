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

[ ✍ source](./example-01.php "Constructor Injection")

### Example 02 - Interface Injection

Interface Injection via runtime definition.

[ ✍ source](./example-02.php "Interface Injection")

### Example 03 - Setter Injection

Setter injection via runtime definition.  The setter method has to be marked as such so that the container knows that the setter is non-optional.

[ ✍ source](./example-03.php "Setter Injection")

### Example 04 - Configuration Parameters

Constructor injection with configuration parameters passed into the instance manager.

[ ✍ source](./example-04.php)

### Example 05 - Call-time Parameters

Constructor injection with parameters passed into the containers `get()` method.

[ ✍ source](./example-05.php)

### Example 06 - Setter Injection With Configuration

Setter injection with configuration. With this form of setter injection, the setter is originally optional, but since parameters that fulfill this method are passed into the configuration, the setter will be called.

[ ✍ source](./example-06.php)

### Example 07 - Setter Injection With Call-time Parameters

setter-injection-with-calltime-params

[ ✍ source](./example-07.php)

### Example 08 - Multiple Injections / Single Injection Point

multiple-injections-to-single-injection-point

[ ✍ source](./example-08.php)

### Example 09 - Setter Injection With Annotation

runtime-setter-injection-with-annotation

[ ✍ source](./example-09.php)

### Example 10 - Compiler Based Constructor Injection

compiler-constructor-injection

[ ✍ source](./example-10.php)

### Example 11 - Compiler Based Interface Injection

compiler-interface-injection

[ ✍ source](./example-11.php)

### Example 12 - Compiled Based Setter Injection With Annotation

compiler-setter-injection-with-annotation

[ ✍ source](./example-12.php)

### Example 13 - Closure based dependency

[ ✍ source](./example-13.php)

### Example 14 - Disambiguation

[ ✍ source](./example-14.php)

### Example 15 - Multiple Injection Points / Multiple Arguments

[ ✍ source](./example-15.php)