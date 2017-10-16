<?php

namespace Modules\Dashboard\Sidebar;

use Maatwebsite\Sidebar\Badge;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    public function __construct()
    {
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {

        $menu->group(trans('dashboard::core.content'), function (Group $group) {

            $group->weight(50);

            $group->item(trans('dashboard::pages.home.index'), function (Item $item) {
                $item->weight(0);
                $item->icon('icon-home2');
                $item->route('admin.home.index');
            });

            $group->item(trans('dashboard::core.clients'), function (Item $item) {
                $item->weight(1);
                $item->icon('icon-user-tie');

                $item->item(trans('dashboard::core.list'), function (Item $item) {
                    $item->weight(1);
                    $item->route('admin.clients.index');
                });

                $item->item(trans('dashboard::core.project-managers'), function (Item $item) {
                    $item->weight(2);
                    $item->route('admin.clients.index');
                });
            });
            $group->item(trans('dashboard::pages.editors.index'), function (Item $item) {
                $item->weight(2);
                $item->icon('icon-spell-check');
                $item->route('admin.editors.index');
            });
            $group->item(trans('dashboard::core.jobs'), function (Item $item) {
                $item->weight(3);
                $item->icon('icon-clipboard3');
                $item->item(trans('dashboard::core.jobs.translations-team'), function (Item $item) {
                    $item->weight(1);
                    $item->route('admin.jobs.translations-team.index');
                });
                $item->item(trans('dashboard::core.jobs.protext-translations'), function (Item $item) {
                    $item->weight(2);
                    $item->route('admin.jobs.protext-translations.index');
                });
            });
            $group->item(trans('dashboard::pages.cat-tools.index'), function (Item $item) {
                $item->weight(4);
                $item->icon('icon-typewriter');
                $item->route('admin.cat-tools.index');
            });
            $group->item(trans('dashboard::pages.expertise.index'), function (Item $item) {
                $item->weight(5);
                $item->icon('icon-medal');
                $item->route('admin.expertise.index');
            });
            $group->item(trans('dashboard::pages.languages.index'), function (Item $item) {
                $item->weight(6);
                $item->icon('icon-bubbles4');
                $item->route('admin.languages.index');
            });
        });

        return $menu;
    }
}
