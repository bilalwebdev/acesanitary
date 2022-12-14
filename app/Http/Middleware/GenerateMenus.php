<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('admin_sidebar', function ($menu) {
            // Dashboard
            //            $menu->add('<i class="nav-icon cil-speedometer"></i> '.__('Dashboard'), [
            //                'route' => 'backend.dashboard',
            //                'class' => 'nav-item w-full',
            //            ])
            //            ->data([
            //                'order'         => 1,
            //                'activematches' => 'admin/dashboard*',
            //            ])
            //            ->link->attr([
            //                'class' => 'nav-link',
            //            ]);

            // Notifications
            //            $menu->add('<i class="nav-icon fas fa-bell"></i> Notifications', [
            //                'route' => 'backend.notifications.index',
            //                'class' => 'nav-item w-full',
            //            ])
            //            ->data([
            //                'order'         => 99,
            //                'activematches' => 'admin/notifications*',
            //                'permission'    => [],
            //            ])
            //            ->link->attr([
            //                'class' => 'nav-link',
            //            ]);

            // Distributors list
            $menu->add('<i class="nav-icon fas fa-bell"></i> Distributors List', [
                'route' => 'backend.distributors.index',
                'class' => 'nav-item w-full',
            ])
                ->data([
                    'order'         => 99,
                    'activematches' => 'admin/notifications*',
                    'permission'    => [],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);

            // Price List
            $menu->add('<i class="nav-icon fas fa-bell"></i> Price List', [
                'url' => 'admin/ace-price/index',
                'class' => 'nav-item w-full',
            ])
                ->data([
                    'order'         => 99,
                    'activematches' => 'admin/notifications*',
                    'permission'    => [],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);

            // Products
            $productsMenu = $menu->add('<i class="nav-icon cil-shield-alt"></i> Products', [
                'class' => 'nav-group w-full',
            ])
                ->data([
                    'order'         => 100,
                    'activematches' => [
                        'admin/users*',
                        'admin/roles*',
                    ],
                    'permission'    => ['view_users', 'view_roles'],
                ]);
            $productsMenu->link->attr([
                'class' => 'nav-link nav-group-toggle',
                'href'  => '#',
            ]);

            // Submenu: Hoses
            $productsMenu->add('<i class="nav-icon cil-people"></i>Hoses', [
                'route' => 'backend.hoses.index',
                'class' => 'nav-item w-full',
            ])
                ->data([
                    'order'         => 101,
                    'activematches' => 'admin/users*',
                    'permission'    => ['view_users'],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);

            // Submenu: End Styles
            $productsMenu->add('<i class="nav-icon cil-people"></i> End Styles', [
                'route' => 'backend.endstyles.index',
                'class' => 'nav-item w-full',
            ])
                ->data([
                    'order'         => 102,
                    'activematches' => 'admin/roles*',
                    'permission'    => ['view_roles'],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);

            // Submenu: Accessories
            $productsMenu->add('<i class="nav-icon cil-people"></i> Accessories', [
                'route' => 'backend.accessories.index',
                'class' => 'nav-item w-full',
            ])
                ->data([
                    'order'         => 102,
                    'activematches' => 'admin/roles*',
                    'permission'    => ['view_roles'],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);




            // $productsMenu->add('<i class="nav-icon cil-people"></i> Chemical Compatibility', [
            //     'route' => 'backend.chemical-compatibility.index',
            //     'class' => 'nav-item w-full',
            // ])
            // ->data([
            //     'order'         => 101,
            //     'activematches' => 'admin/users*',
            //     'permission'    => ['view_users'],
            // ])
            // ->link->attr([
            //     'class' => 'nav-link',
            // ]);

            // Assets Menu
            $assetsMenu = $menu->add('<i class="nav-icon cil-shield-alt"></i> Assets', [
                'class' => 'nav-group w-full',
            ])
                ->data([
                    'order'         => 100,
                    'activematches' => [
                        'admin/series*',
                        'admin/material*',
                    ],
                    'permission'    => ['view_users', 'view_roles'],
                ]);
            $assetsMenu->link->attr([
                'class' => 'nav-link nav-group-toggle',
                'href'  => '#',
            ]);

            // Submenu: Series
            $assetsMenu->add('<i class="nav-icon cil-people"></i> Series', [
                'route' => 'backend.series.index',
                'class' => 'nav-item w-full',
            ])
                ->data([
                    'order'         => 101,
                    'activematches' => 'admin/series*',
                    'permission'    => ['view_users'],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);

            // Submenu: Material
            $assetsMenu->add('<i class="nav-icon cil-people"></i> Material', [
                'route' => 'backend.material.index',
                'class' => 'nav-item w-full',
            ])
                ->data([
                    'order'         => 102,
                    'activematches' => 'admin/material*',
                    'permission'    => ['view_roles'],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);

            // Submenu: Tolerances Messaging
            $assetsMenu->add('<i class="nav-icon cil-people"></i> Tolerances Messaging', [
                'url' => 'admin/tolerance-messaging/index',
                'class' => 'nav-item w-full',
            ])
                ->data([
                    'order'         => 102,
                    'activematches' => 'admin/roles*',
                    'permission'    => ['view_roles'],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);

            // Submenu: Hose Size
            $assetsMenu->add('<i class="nav-icon cil-people"></i> Hose Size', [
                'url' => 'admin/hose-size/index',
                'class' => 'nav-item w-full',
            ])
                ->data([
                    'order'         => 102,
                    'activematches' => 'admin/roles*',
                    'permission'    => ['view_roles'],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);

            // Submenu: Media

            $assetsMenu->add('<i class="nav-icon cil-people"></i> Media', [
                'route' => 'backend.media.index',
                'class' => 'nav-item w-full',
            ])
                ->data([
                    'order'         => 102,
                    'activematches' => 'admin/roles*',
                    'permission'    => ['view_roles'],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);

            // Submenu: Models

            $assetsMenu->add('<i class="nav-icon cil-people"></i> Model', [
                'route' => 'backend.models.index',
                'class' => 'nav-item w-full',
            ])
                ->data([
                    'order'         => 102,
                    'activematches' => 'admin/roles*',
                    'permission'    => ['view_roles'],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);

            $assetsMenu->add('<i class="nav-icon cil-people"></i> Restrictions / Regulations', [
                'route' => 'backend.regulations.index',
                'class' => 'nav-item w-full',
            ])
                ->data([
                    'order'         => 102,
                    'activematches' => 'admin/roles*',
                    'permission'    => ['view_roles'],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);


            $assetsMenu->add('<i class="nav-icon fas fa-list"></i> Application Types', [
                'route' => 'backend.application-types.index',
                'class' => 'nav-item w-full',
            ])
                ->data([
                    'order'         => 102,
                    'activematches' => 'admin/notifications*',
                    'permission'    => [],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);



            // Separator: Access Management
            $menu->add('Management', [
                'class' => 'nav-title',
            ])
                ->data([
                    'order'         => 103,
                    'permission'    => ['edit_settings', 'view_backups', 'view_users', 'view_roles', 'view_logs'],
                ]);

            // Settings
            $menu->add('<i class="nav-icon fas fa-cogs"></i> Settings', [
                'route' => 'backend.settings',
                'class' => 'nav-item w-full',
            ])
                ->data([
                    'order'         => 104,
                    'activematches' => 'admin/settings*',
                    'permission'    => ['edit_settings'],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);

            // Backup
            //            $menu->add('<i class="nav-icon fas fa-archive"></i> Backups', [
            //                'route' => 'backend.backups.index',
            //                'class' => 'nav-item w-full',
            //            ])
            //            ->data([
            //                'order'         => 105,
            //                'activematches' => 'admin/backups*',
            //                'permission'    => ['view_backups'],
            //            ])
            //            ->link->attr([
            //                'class' => 'nav-link',
            //            ]);

            // Access Control Dropdown
            $accessControl = $menu->add('<i class="nav-icon cil-shield-alt"></i> Access Control', [
                'class' => 'nav-group w-full',
            ])
                ->data([
                    'order'         => 106,
                    'activematches' => [
                        'admin/users*',
                        'admin/roles*',
                    ],
                    'permission'    => ['view_users', 'view_roles'],
                ]);
            $accessControl->link->attr([
                'class' => 'nav-link nav-group-toggle',
                'href'  => '#',
            ]);

            // Submenu: Users
            $accessControl->add('<i class="nav-icon cil-people"></i> Users', [
                'route' => 'backend.users.index',
                'class' => 'nav-item w-full',
            ])
                ->data([
                    'order'         => 107,
                    'activematches' => 'admin/users*',
                    'permission'    => ['view_users'],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);

            // Submenu: Roles
            $accessControl->add('<i class="nav-icon cil-people"></i> Roles', [
                'route' => 'backend.roles.index',
                'class' => 'nav-item w-full',
            ])
                ->data([
                    'order'         => 108,
                    'activematches' => 'admin/roles*',
                    'permission'    => ['view_roles'],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);
            /*
            // Log Viewer
            // Log Viewer Dropdown
            $accessControl = $menu->add('<i class="nav-icon cil-list-rich"></i> Log Viewer', [
                'class' => 'nav-group w-full',
            ])
            ->data([
                'order'         => 109,
                'activematches' => [
                    'log-viewer*',
                ],
                'permission'    => ['view_logs'],
            ]);
            $accessControl->link->attr([
                'class' => 'nav-link nav-group-toggle',
                'href'  => '#',
            ]);

            // Submenu: Log Viewer Dashboard
            $accessControl->add('<i class="nav-icon cil-list"></i> Dashboard', [
                'route' => 'log-viewer::dashboard',
                'class' => 'nav-item w-full',
            ])
            ->data([
                'order'         => 110,
                'activematches' => 'admin/log-viewer',
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);

            // Submenu: Log Viewer Logs by Days
            $accessControl->add('<i class="nav-icon cil-list-numbered"></i> Logs by Days', [
                'route' => 'log-viewer::logs.list',
                'class' => 'nav-item w-full',
            ])
            ->data([
                'order'         => 111,
                'activematches' => 'admin/log-viewer/logs*',
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
*/
            // Access Permission Check
            $menu->filter(function ($item) {
                if ($item->data('permission')) {
                    if (auth()->check()) {
                        if (auth()->user()->hasRole('super admin')) {
                            return true;
                        } elseif (auth()->user()->hasAnyPermission($item->data('permission'))) {
                            return true;
                        }
                    }

                    return false;
                } else {
                    return true;
                }
            });

            // Set Active Menu
            $menu->filter(function ($item) {
                if ($item->activematches) {
                    $activematches = (is_string($item->activematches)) ? [$item->activematches] : $item->activematches;
                    foreach ($activematches as $pattern) {
                        if (request()->is($pattern)) {
                            $item->active();
                            $item->link->active();
                            if ($item->hasParent()) {
                                $item->parent()->active();
                            }
                        }
                    }
                }

                return true;
            });
        })->sortBy('order');

        return $next($request);
    }
}
