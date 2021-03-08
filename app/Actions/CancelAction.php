<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class CancelAction extends AbstractAction
{
    public function getTitle()
    {
        // Action title which display in button based on current status
        // return $this->data->{'confirmation'}=="CONFIRMED"?'Confirm':'Details';
        return 'Reject';
    }

    public function getIcon()
    {
        // Action icon which display in left of button based on current status
        // return $this->data->{'confirmation'}=="CONFIRMED"?'voyager-external':'voyager-eye';
        return 'voyager-exclamation';
    }

    public function getAttributes()
    {
        // Action button class
        return [
            'class' => 'btn btn-sm btn-danger pull-right',
        ];
    }

    public function shouldActionDisplayOnDataType()
    {
        // show or hide the action button, in this case will show for posts model
        return $this->dataType->slug == 'reservations';
    }

    public function getDefaultRoute()
    {
        // URL for action button when click
        return route('voyager.'.$this->dataType->slug.'.edit', $this->data->{$this->data->getKeyName()});
    }
}