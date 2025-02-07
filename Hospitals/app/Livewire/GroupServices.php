<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use App\Models\Group;
use Livewire\Attributes\On;

class GroupServices extends Component
{
    public $GroupsItems = [];
    public $allServices;
    public $discount_value ;
    public $taxes = 17;
    public $name_group;
    public $notes;
    public $ServiceSaved = false;
    public $groupId;

    protected $rules = [
    'name_group' => 'required|string|max:255',
    'notes' => 'nullable|string',
    ];


    public function __construct()
    {
        $this->allServices = Service::all();
        if(session()->has('groupId'))
        {
            $this->groupId = session()->get('groupId');
            $group = Group::find($this->groupId);
            foreach ($group->Services as $index => $service) {

                  $this->GroupsItems[$index]['service_id']=$service->id;
                  $this->GroupsItems[$index]['service_name']=$service->name;
                  $this->GroupsItems[$index]['service_price']=$service->price;
                  $this->GroupsItems[$index]['quantity']=$service->pivot->quantity;
                  $this->GroupsItems[$index]['is_saved']=true;
            }

            $this->name_group=$group->name;
            $this->notes = $group->notes;
            $this->discount_value = $group->discount_value;
        }

    }

    function SetError($error)
    {
        foreach ($this->GroupsItems as $key => $groupItem)
        {
            if (!$groupItem['is_saved'])
            {
                $this->addError('GroupsItems.' . $key , $error);
                return true ;
            }
        }
    }


   public function addService()
   {
      $this->resetErrorBag();
    if ($this->SetError('يجب حفظ هذه الخدمة قبل إنشاء خدمة جديدة.')) return;

    $this->GroupsItems[] = [
        'service_id' => '',
        'quantity' => 1,
        'is_saved' => false,
        'service_name' => '',
        'service_price' => 0
    ];

    $this->ServiceSaved = false;

   }

   public function saveService($index)
   {
        if($this->GroupsItems[$index]['service_id'])
        {
            $service = $this->allServices->find($this->GroupsItems[$index]['service_id']);
            $this->GroupsItems[$index]['service_name'] = $service->name;
            $this->GroupsItems[$index]['service_price'] = $service->price;
            $this->GroupsItems[$index]['is_saved'] = true;
        }
        else
        {
          if($this->SetError('قم بتحديد الخدمة اولا')) return ;
        }

   }
   public function editService($index)
   {
     if($this->SetError('يجب حفظ هذا الخدمة قبل تعديل خدمة اخرى.')) return;
      $this->GroupsItems[$index]['is_saved'] = false;
   }

   public function RemovrService($index)
   {
        unset($this->GroupsItems[$index]);
        $this->GroupsItems = array_values($this->GroupsItems);
   }

   function getTotal()
   {
       $total = 0;
        foreach ($this->GroupsItems as $groupItem) {
            if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) {
                $total += $groupItem['service_price'] * $groupItem['quantity'];
            }
        }
        return $total;
   }

    public function render()
    {
        $total = $this->getTotal();
        return view('livewire.GroupServices.group-services',[
            'subtotal' => $Total_after_discount = $total - ((is_numeric($this->discount_value) ? $this->discount_value : 0)),
            'total' => $Total_after_discount * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100)
        ]);
    }


    public function SaveGroup()
    {
        try {

            $total = $this->getTotal();
            $this->validate();
            if(!empty($this->groupId))
            $Group = Group::find($this->groupId);
            else $Group = new Group();

            $Group->name = $this->name_group;
            $Group->notes = $this->notes;
            $Group->Total_before_discount = $total ;
            $Group->discount_value = $this->discount_value;
            $Group->tax_rate = $this->taxes;
            $Group->Total_after_discount = $total - ((is_numeric($this->discount_value) ? $this->discount_value : 0));
            $Group->Total_with_tax = $Group->Total_after_discount * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);
            if($Group->save())
            {
               $services_id = array_column($this->GroupsItems, 'service_id');
               $services_quantity = array_column($this->GroupsItems, 'quantity');
               $data = array_combine($services_id,$services_quantity);
               $data_services = array_map(
                function($quantity) {
                    return ['quantity' => $quantity];
                }
                ,$data);
               $Group->Services()->sync($data_services);
               session()->flash('add');
            }

            $this->reset('GroupsItems', 'name_group', 'notes');
             $this->discount_value = 0;

        } catch (\Exception $ex) {
            session()->flash('error', $ex->getMessage());
        }

    }
}
