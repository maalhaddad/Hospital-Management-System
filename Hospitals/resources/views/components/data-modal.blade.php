<!-- Modal -->

<div class="modal fade" id="{{ $type }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ $route }}" method="post" autocomplete="off">
                @csrf

                @if ($type == 'insert')
                <div class="modal-body">
                    <label for="name">{{__('Dashboard/section_trans.name_sections')}}</label>
                    <input id="name" type="text" name="name" class="form-control" required >

                    <div class="col-lg">
                        <label for="description">{{__('sections_trans.description')}}</label>
                        <textarea id="description" name="description" class="form-control"  rows="3"></textarea>
                    </div>
                </div>

                @elseif($type == 'edit')

                @method('PUT')
                <div class="modal-body">
                    <label for="exampleInputPassword1">{{__('Dashboard/section_trans.name_sections')}}</label>
                    <input type="text" name="name" id="name" class="form-control" required >
                    <input type="hidden" name="section_id" id="section_id" class="form-control" required >

                    <div class="col-lg">
                        <label for="description">{{__('sections_trans.description')}}</label>
                        <textarea id="description" name="description" class="form-control"  rows="3"></textarea>
                    </div>
                </div>

                @else

                @method('delete')
                <div class="modal-body">

                    <input type="hidden" name="section_id" id="section_id" class="form-control" required >
                </div>


                @endif



                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Dashboard/section_trans.Close')}}</button>
                    <button type="submit" class="btn btn-{{ $btntype }}">{{__('Dashboard/section_trans.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- __('Dashboard/section_trans.add_sections') --}}
