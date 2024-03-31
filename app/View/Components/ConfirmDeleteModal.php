<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ConfirmDeleteModal extends Component
{
    public $action;
    public $itemName;

    public function __construct($action, $itemName = 'item')
    {
        $this->action = $action;
        $this->itemName = $itemName;
    }

    public function render(): View|Closure|string
    {
        return view('components.confirm-delete-modal');
    }
}
