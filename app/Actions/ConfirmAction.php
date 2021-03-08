<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class ConfirmAction extends AbstractAction
{
    public function getTitle()
    {
        // Action title which display in button based on current status
        return $this->data->{'confirmation'}=="CONFIRMED"?'Confirm':'View Details';
        // return 'Confirm';
    }

    public function getIcon()
    {
        // Action icon which display in left of button based on current status
        // return $this->data->{'confirmation'}=="CONFIRMED"?'voyager-check':'voyager-eye';
        return '';
    }

    public function getAttributes()
    {
        // Action button class
        if($this->data->{'confirmation'}=="CONFIRMED"){
            return [
            'class' => 'btn btn-sm btn-success pull-right',
            ];
        }
        else {
            return [
                'class' => 'btn btn-sm btn-primary pull-right',
                ];
            }
    }

    public function shouldActionDisplayOnDataType()
    {
        // show or hide the action button, in this case will show for posts model
        return $this->dataType->slug == 'reservations';
    }

    public function getDefaultRoute()
    {
        // URL for action button when click
        if($this->data->{'confirmation'}=="CONFIRMED"){
            return route('voyager.'.$this->dataType->slug.'.edit', $this->data->{$this->data->getKeyName()});
        }
        else {
            return route('voyager.'.$this->dataType->slug.'.show', $this->data->{$this->data->getKeyName()});
            }
        
    }
}