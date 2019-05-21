<?php

namespace koolreport\blade;

trait Engine
{
    public function __constructBladeEngine()
    {
        if (method_exists($this, "bladeInit")) {
            $this->templateEngine = new BladeTemplateEngine($this->bladeInit());
        }
    }
}