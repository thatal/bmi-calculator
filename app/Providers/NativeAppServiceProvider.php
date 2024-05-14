<?php

namespace App\Providers;

use Native\Laravel\Facades\Window;
use Native\Laravel\Contracts\ProvidesPhpIni;
use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Menu\Menu;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        Menu::new()
            // ->appMenu()
            ->submenu('Application', Menu::new()
                ->quit()
            )
            ->submenu('About', Menu::new()
                ->link('https://github.com/thatal', 'Author')
            )
            ->register();
        Window::open()
            ->showDevTools(false)
            ->width(400)
            ->height(600)
            ->resizable(false)
            // ->movable(false)
            // ->minimizable(false)
            ->maximizable(false)
            // ->closable(false)
            ->backgroundColor('#00000050')
            // ->hideMenu()
            ;
        // MenuBar::create()
        //     ->label('Status Online')
        //     // ->showDockIcon()
        //     ->withContextMenu(
        //         Menu::new()
        //             ->label('BMI Calculator')
        //             ->separator()
        //             ->link('https://nativephp.com', 'Learn more…')
        //             ->separator()
        //             ->quit()

        //     )
        //     ;
    }

    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [];
    }
}
