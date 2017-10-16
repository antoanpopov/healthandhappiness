<?php

namespace Modules\Core\Sidebar;

use Illuminate\Contracts\Container\Container;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\ShouldCache;
use Maatwebsite\Sidebar\Sidebar;
use Maatwebsite\Sidebar\Traits\CacheableTrait;

class AdminSidebar implements Sidebar, ShouldCache
{
    use CacheableTrait;
    /**
     * @var Menu
     */
    protected $menu;

    /**
     * @var Container
     */
    protected $container;

    /**
     * @param Menu $menu
     * @param Container $container
     */
    public function __construct(Menu $menu, Container $container)
    {
        $this->menu = $menu;
        $this->container = $container;
    }

    /**
     * Build your sidebar implementation here
     */
    public function build()
    {
        $this->addToSidebar(\Modules\Core\Sidebar\SidebarExtender::class);
        $this->addToSidebar(\Modules\Dashboard\Sidebar\SidebarExtender::class);
    }

    /**
     * Add the given class to the sidebar collection
     * @param string $class
     */
    private function addToSidebar($class)
    {
        if (class_exists($class) === false) {
            return;
        }
        $extender = $this->container->make($class);

        $this->menu->add($extender->extendWith($this->menu));
    }

    /**
     * @return Menu
     */
    public function getMenu()
    {
        $this->build();

        return $this->menu;
    }

    /**
     * Check if the module has a custom sidebar class configured
     * @param string $module
     * @return bool
     */
    private function hasCustomSidebar($module)
    {
        $config = config("asgard.{$module}.config.custom-sidebar");

        return $config !== null;
    }
}
