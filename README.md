# Blade for KoolReport

This package make KoolReport able to use Blade template engine to generate view content.

# Installation

Run composer command

```
composer require koolreport\blade
```

# Guide

1. Add `use \koolreport\blade\Engine;` to your report
2. Add protected method `bladeInit()` and return the blade object

# Example

```
class MyReport extends \koolreport\KoolReport
{
    use \koolreport\blade\Engine;
    
    protected function bladeInit()
    {
        $viewsFolder = __DIR__."/views";
        $cacheFolder = __DIR__."/cache";
        $blade = new \Jenssegers\Blade\Blade($viewsFolder, $cacheFolder);
        return $blade
    }
}
```

Supposed you have a view for report named `myreport.blade.php` inside `views` folder, you can render your report like this:

```
$report = new MyReport;
$report->run()->render("myreport");
```

# Support

Please use [our forum](https://www.koolreport.com/forum/topics) if you need support, by this way other people can benefit as well. If the support request need privacy, you may send email to us at [support@koolreport.com](mailto:support@koolreport.com).