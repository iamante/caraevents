<?php

namespace App\Widgets;

use App\Service;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

class Services extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Service::count();
        $string = trans_choice('Services', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-bag',
            'title'  => "All {$string}",
            'text'   => $count,
            'button' => [
                'text' => 'View service',
                'link' => '/admin/services',
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(Service::class));;
    }
}
