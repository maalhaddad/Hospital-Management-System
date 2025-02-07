<div>
    @if (!($showAddGroupsComponent || $showEditGroupsComponent))
    @if (session()->has('delete'))
    <div class="alert alert-info">{{ __('Dashboard/messages.delete') }}</div>
    @endif
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between mb-2">
            <button type="button"
             wire:click="ShowAddGroups"
             class="btn btn-primary" >
                {{-- {{trans('Dashboard/section_trans.add_sections')}} --}}
                إضافة عرض
            </button>
            {{-- <button type="button" wire:click="DeleteGroup('1')" class="btn btn-sm btn-success"><i class="las la-pen"></i></button> --}}
        </div>

    </div>
    <div class="table-responsive">
        <table style="width: 100%" class="table text-md-nowrap" id="example2">
            <thead>
            <tr>
                <th class="wd-10p border-bottom-0">#</th>
                <th class="wd-15p border-bottom-0">{{__('Dashboard/section_trans.name_sections')}}</th>
                <th class="wd-15p border-bottom-0">{{__('sections_trans.description')}}</th>
                <th class="wd-20p border-bottom-0">{{__('sections_trans.created_at')}}</th>
                <th class="wd-20p border-bottom-0">{{__('sections_trans.Processes')}}</th>
            </tr>
            </thead>
            <tbody>
           @foreach($groups as $group)
               <tr>
                   <td>{{$loop->iteration}}</td>
                   <td>{{$group->name}}</td>
                   <td>{{\Str::limit($group->notes, 40)}}</td>
                   <td>{{ $group->created_at->diffForHumans() }}</td>
                   <td>

                    <button type="button" wire:click="ShowEditGroups({{ $group->id }})" class="btn btn-sm btn-success"><i class="las la-pen"></i></button>
                    <button data-toggle="modal" data-group_id="{{ $group->id }}" data-target="#delete_group"  class="btn btn-sm btn-danger"><i class="las la-trash"></i></button>
                   </td>
               </tr>

            @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal" id="delete_group">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{__('doctors_trans.delete_doctor')}}</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form wire:submit.prevent="DeleteGroup" >
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p>{{ __('sections_trans.Warning') }}</p><br>
                        <input type="text" name="group_id" wire:model="group_id" id="group_id" value="0">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Dashboard/section_trans.Close')}}</button>
                        <button type="submit" class="btn btn-danger">{{__('Dashboard/section_trans.submit')}}</button>
                    </div>
            </div>
            </form>
        </div>
    </div>


    @else
    <livewire:group-services />
    @endif

</div>
