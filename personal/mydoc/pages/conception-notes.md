Gorman json decoder
========
2020-05-28




Working with php and js, a common thing to do is to convert a php array into a js array-object using
php's **json_decode** function.


The **json_decode** function works fine, but does not translate callbacks written as php strings to actual js callbacks.


That's where the Gorman json decoder comes handy.

It basically let you define js callbacks as strings in php land, like this:



```php 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
</head>

<body>


<?php



require_once "init.inc.php"; // just the autoloader for the GormanJsonDecoder


use Ling\GormanJsonDecoder\GormanJsonDecoder;

$arr = GormanJsonDecoder::encode([
    'a' => 123,
    'b' => true,
    'c' => "a string",
    'd' => [
        "fruits" => ['apple', 'banana'],
        "dogs" => 4,
    ],
    'e' => 'function(arg1){
        console.log("I was called with arg: " + arg1);
        return 456;
    }',
    'f' => null,
], ['e']);


?>


<script>

    let arr = <?php echo $arr->toJsCode(); ?>;
    console.log(arr.e("hello"));
    // will output:
    // I was called with arg: hello
    // 456


</script>
</body>
</html>
 

```




The **encode** method returns a GormanEncodedData instance, which has at least the following methods:

- toJsCode, to get the js array object 
- toPhpArray, to get back the php array if necessary



Beware that this tool uses the js Function object under the hood, which is a sibling of eval.

So make sure to have full control over those callbacks before using the Gorman decoder. 


