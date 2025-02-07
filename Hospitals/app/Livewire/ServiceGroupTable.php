<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Component;

class ServiceGroupTable extends Component
{
    public $groups;
    public $group_id;
    public $showAddGroupsComponent = false;
    public $showEditGroupsComponent = false;


    public function __construct()
    {
      $this->groups = Group::all();
    }
    public function ShowAddGroups()
    {
        $this->showAddGroupsComponent=true;
    }

    public function ShowEditGroups($groupId)
    {
        session()->flash('groupId',$groupId);
        $this->showEditGroupsComponent=true;

    }

    public function DeleteGroup()
    {
        Group::destroy($this->group_id);
        session()->flash('delete');
    }
    public function render()
    {
        return view('livewire.GroupServices.service-group-table');
    }
}
