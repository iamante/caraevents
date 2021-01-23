<?php

namespace App\Widgets;

use App\Reservation;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

class Reservations extends AbstractWidget
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
        $count = Reservation::count();
        $string = trans_choice('Reservations', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-receipt',
            'title'  => "{$count} {$string}",
            'text'   => 'You have ' .$count. ' pending reservation in your database. Click on button below to view all reservations.',
            'button' => [
                'text' => 'View all reservation',
                'link' => '/admin/reservation',
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(Reservation::class));;
    }
}
