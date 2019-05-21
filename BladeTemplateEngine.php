<?php

namespace koolreport\blade;

class BladeTemplateEngine implements \koolreport\core\ITemplateEngine
{
    protected $blade;
    public function __construct($blade)
    {
        $this->blade = $blade;
    }

    public function render($view, $params)
    {
        return $this->blade->make($view, $params);
    }
}