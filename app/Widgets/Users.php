<?php

namespace App\Widgets;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use TCG\Voyager\Facades\Voyager;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;

class Users extends AbstractWidget
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
        
        $count = array("daily" => 0, "weekly" => 0, "monthly" => 0);
        $count['daily'] = User::where('created_at','>=',Carbon::today())->count();
        $count['weekly'] = User::where('created_at','>=',Carbon::today()->subDays(7))->count();
        $count['monthly'] = User::where('created_at','>=',Carbon::today()->subDays(30))->count();
        $counts = User::count();
        $string = trans_choice('voyager::dimmer.user', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-people',
            // 'title'  => "{$count} Total {$string}",
            'title'  => "Total {$string}",
            // 'text'   => "+{$count['monthly']}",
            'text' => "{$counts}",
            'button' => [
                'text' => 'View Users',
                'link' => route('voyager.users.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('User'));
    }
}
