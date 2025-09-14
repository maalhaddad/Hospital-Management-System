{{-- <div>

  @if ($message == true)
 <div class="alert alert-success">
        {{ trans('Dashboard/messages.add') }}
    </div>
@endif
    <form method="post" wire:submit.prevent="store">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="text" wire:model="name" name="username" placeholder="اسمك" required="">
                <span class="icon fa fa-user"></span>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="email" wire:model="email" name="email" placeholder="البريد الالكتروني" required="">
                <span class="icon fa fa-envelope"></span>
            </div>


            <div class="col-md-6 mg-t-5 mg-md-t-0 mb-3">
                <select dir="rtl" wire:model="doctorId" name="section_id"
                    class="form-control  @error('section_id') is-invalid @enderror "">
                    <option value="" selected disabled>---حدد الطبيب---</option>
                        @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>

                        @endforeach

                </select>
                <x-input-error :messages="$errors->get('section_id')" class="mt-2" />
            </div>


            <div class="col-md-6 mg-t-5 mg-md-t-0">
                <select dir="rtl" wire:model="sectionId" wire:change="getDoctors" name="section_id"
                    class="form-control  @error('section_id') is-invalid @enderror "">
                    <option value="" selected disabled>---حدد القسم---</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('section_id')" class="mt-2" />
            </div>


            <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                <input type="tel" class="intl-tel-input" id="phone" wire:model="phone" name="phone" placeholder="رقم الهاتف" required="">
                <span class="icon fas fa-phone"></span>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <textarea name="message" wire:model="notes" placeholder="Message"></textarea>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <button class="theme-btn btn-style-two" type="submit" name="submit-form">
                    <span class="txt">تاكيد</span></button>
            </div>
        </div>
    </form>
</div>

 --}}


<div>

  @if ($message == true)
    <div class="alert alert-success">
        {{ trans('Dashboard/messages.add') }}
    </div>
  @endif

  <form method="post" wire:submit.prevent="store">
    <div class="row clearfix">

        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <input type="text" wire:model="name" name="username" placeholder="اسمك" required="">
            <span class="icon fa fa-user"></span>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <input type="email" wire:model="email" name="email" placeholder="البريد الالكتروني" required="">
            <span class="icon fa fa-envelope"></span>
        </div>

        <div class="col-md-6 mg-t-5 mg-md-t-0 mb-3">
            <select dir="rtl" wire:model="doctorId" name="section_id"
                class="form-control  @error('section_id') is-invalid @enderror ">
                <option value="" selected disabled>---حدد الطبيب---</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('section_id')" class="mt-2" />
        </div>

        <div class="col-md-6 mg-t-5 mg-md-t-0">
            <select dir="rtl" wire:model="sectionId" wire:change="getDoctors" name="section_id"
                class="form-control  @error('section_id') is-invalid @enderror ">
                <option value="" selected disabled>---حدد القسم---</option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('section_id')" class="mt-2" />
        </div>

        <!-- ===== حقل الهاتف الدولي الجديد ===== -->
        <div class="col-lg-12 col-md-6 col-sm-12 form-group">
            <input type="tel" class="form-control" id="phone" wire:model="phone" name="phone" placeholder="رقم الهاتف" required="">
            <span class="icon fas fa-phone"></span>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
            <textarea name="message" wire:model="notes" placeholder="Message"></textarea>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
            <button class="theme-btn btn-style-two" type="submit" name="submit-form">
                <span class="txt">تاكيد</span>
            </button>
        </div>

    </div>
  </form>



</div>


