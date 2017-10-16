<?php

namespace Modules\Core\Sidebar;

use Maatwebsite\Sidebar\Badge;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        return $menu;
    }
}
