# Blade

## Overview

If you have used Laravel and fell in love with `Blade` template engine then you may use this love template engine with KoolReport. Starting from version 4.0.0, KoolReport supports other template engines rather than just its own template view file.

So by using `blade` template engine, you can utilize the power of template inheritance such as creating common layout for your report. 

Blade does not restrict you from using plain PHP code in your views. In fact, all Blade views are compiled into plain PHP code and cached until they are modified, meaning Blade adds essentially zero overhead to your report.

## Installation

#### By downloading .zip file

1. [Download](https://www.koolreport.com/packages/blade)
2. Unzip the zip file
3. Copy the folder `blade` into `koolreport` folder so that look like below

```bash
koolreport
├── core
├── blade
```

#### By composer

```
composer require koolreport/blade
```

## Get started

__Step 1:__ First you should create two folders, first is `views` to hold the views of your reports, secondly is `cache` folder for blade to generate cache file.

```bash
project/
├── reports/
│   └── MyReport.php
├── views/
│   └── myreport.blade.php
├── cache/
```

__Step 2:__ Next, in your `MyReport.php` you initiate blade template like this:

```
require_once "../../koolreport/core/autoload.php";

class MyReport extends \koolreport\KoolReport
{
    use \koolreport\blade\Engine;
    
    protected function bladeInit()
    {
        $viewsFolder = __DIR__."/../views";
        $cacheFolder = __DIR__."/../cache";
        $blade = new \Jenssegers\Blade\Blade($viewsFolder, $cacheFolder);
        return $blade;
    }
    ...

}
```

__Step 3:__ Create report's view content. In your `myreport.blade.php` you can do:

```
<html>
<head>
    <title>MyReport</title>
</head>
<body>
    <?php
    \koolreport\widgets\koolphp\Table::create(array(
        "dataSource"=>$report->dataStore("result"),
    ));
    ?>
</body>
</html>
```

__*Important Note*:__ You need to use `$report` variable to refer to the report class, not `$this` as you do when use default Koolreport view file.

__Step 4:__ To make the report run and render, you do:


```
//index.php

require_once "MyReport.php";

$report = new MyReport;
$report->run()->render("myreport"); // You need to specify the view you want to render
```

Now your report will run and then use `myreport.blade.php` to render the view of report. 

__Congrat!__


# Resources

1. [Full documentation](https://www.koolreport.com/docs/blade/overview/)
2. [Examples & Demonstration](https://www.koolreport.com/examples)

# Support

Please use [our forum](https://www.koolreport.com/forum/topics) if you need support, by this way other people can benefit as well. If the support request need privacy, you may send email to us at [support@koolreport.com](mailto:support@koolreport.com).