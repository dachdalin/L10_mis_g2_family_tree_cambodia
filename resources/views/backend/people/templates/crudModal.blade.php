<div class="modal fade" id="crudObjectModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <form id="frmCrudObject" action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title"></h5>
          <button id="buttonClose" type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="object_id" id="object_id">
          {{-- <input type="hidden" name="crudRoutePath" id="crudRoutePath" value="{{ $crudRoutePath }}"> --}}
          <div class="row">

            {{-- Firstname and Birthname --}}
            <div class="col-md-6">

              <div class="form-group">
                <label for="first_name" class="form-control-label mb-1">First Name:</label>
                <input id="first_name" name="first_name" class="form-control" type="text" placeholder="First Name">
                <span class="text-danger error-text first_name_error"></span>
              </div>

              <div class="form-group">
                <label for="birth_name" class="form-control-label mb-1">Birthname:</label>
                <input id="birth_name" name="birth_name" class="form-control" type="text" placeholder="Birth Name">
                <span class="text-danger error-text birth_name_error"></span>
              </div>
            </div>

            {{-- Lastname and Nickname --}}
            <div class="col-md-6">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 pb-2">

                  <div class="form-group">
                    <label for="last_name" class="form-control-label mb-1">Last Name: <span class="text-danger">*</span></label>
                    <input id="last_name" name="last_name" class="form-control" type="text" placeholder="Last Name">
                    <span class="text-danger error-text last_name_error"></span>
                  </div>

                  <div class="form-group">
                    <label for="nick_name" class="form-control-label mb-1">Nickname:</label>
                    <input id="nick_name" name="nick_name" class="form-control" type="text" placeholder="Nickname">
                    <span class="text-danger error-text nick_name_error"></span>
                  </div>
                </div>
              </div>
            </div>

            {{-- Sex (biological) --}}
            <div class="col-md-6">
              <div class="row">

                <div class="col-span-6 md:col-span-3">
                  <label class="block font-medium text-sm text-gray-700 mr-5" for="sex">
                    Sex (biological) : *
                  </label>
                  <div class="flex">
                      <div class="mt-3 mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                          <div>
                            <div class="flex items-center">
                                <label for="sexM" class="relative inline-flex cursor-pointer items-start">
                                    <div class="flex items-center">
                                      <div>
                                          <input id="sexM" type="radio" class="form-radio dark:border-dark-600 border-1 dark:bg-dark-800 rounded-full border-gray-300 bg-white transition duration-100 ease-in-out h-5 w-5 text-primary-500 focus:ring-primary-500 dark:ring-offset-dark-900" wire:model="personForm.sex" name="sex" value="m">
                                      </div>
                                      <span class="dark:text-dark-400 cursor-pointer items-center text-sm font-medium text-gray-700 ml-2">
                                          Male
                                      </span>
                                    </div>
                                </label>
                            </div>
                          </div>
                      </div>
                      <div class="mt-3 mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                          <div>
                            <div class="flex items-center">
                                <label for="sexF" class="relative inline-flex cursor-pointer items-start">
                                    <div class="flex items-center">
                                      <div>
                                          <input id="sexF" type="radio" class="form-radio dark:border-dark-600 border-1 dark:bg-dark-800 rounded-full border-gray-300 bg-white transition duration-100 ease-in-out h-5 w-5 text-primary-500 focus:ring-primary-500 dark:ring-offset-dark-900" wire:model="personForm.sex" name="sex" value="f">
                                      </div>
                                      <span class="dark:text-dark-400 cursor-pointer items-center text-sm font-medium text-gray-700 ml-2">
                                          Female
                                      </span>
                                    </div>
                                </label>
                            </div>
                          </div>
                      </div>
                  </div>
                </div>

              </div>

            </div>
             
            {{-- Gender identity : --}}
            <div class="col-md-6">
              <div class="row">

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="type" class="form-control-label mb-1">Gender identity : <span class="text-danger">*</span></label>
                    <select id="type" name="type" class="form-control select2" data-placeholder="Click to Choose...">
                      {{-- @foreach ($school_types as $school_type)
                        <option value="{{ $school_type->id}}">{{ $school_type->name }}</option>
                      @endforeach --}}
                    </select>
                    <span class="text-danger error-text type_error"></span>
                  </div>
                </div>

                {{-- <div class="col-lg-12 col-md-12 col-sm-12 mb-12">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group mt-4">
                      <div class="form-check form-switch">
                        <input id="status" name="status" type="checkbox" class="ace-switch" checked>
                        <label class="form-check-label mt-1" for="flexSwitchCheckChecked"><strong>&nbsp;&nbsp;Status</strong></label>
                      </div>
                    </div>
                  </div>
  
                </div> --}}

              </div>

            </div>

            {{-- Year of birth --}}
            <div class="col-md-6">

              <div class="form-group">
                <label for="yob" class="form-control-label mb-1">Year of birth:</label>
                <input id="yob" name="yob" class="form-control" type="text" placeholder="Year of birth">
                <span class="text-danger error-text yob_error"></span>
              </div>
              
            </div>

            {{-- Date of birth : --}}
            <div class="col-md-6">

              <div class="form-group">
                <label for="enrollment_date">Date of birth :</label>
                <input type="date" name="enrollment_date" class="form-input form-control">
              </div>

            </div>

            {{-- Place of birth : --}}
            <div class="col-md-12">
              <div class="form-group">
                <label for="pob" class="form-control-label mb-1">Place of birth :</label>
                <input id="pob" name="pob" class="form-control" type="text" placeholder="Place of birth" multiple="2">
                <span class="text-danger error-text pob_error"></span>
              </div>
            </div>

            {{-- <div class="col-md-12">
              <div class="form-group">
                <label for="description" class="form-control-label mb-1">Description: <span class="text-danger">*</span></label>
                <textarea id="description" name="description"
                        class="textarea_editor form-control border-radius-0"  placeholder="Enter text ..."></textarea>
                <span class="text-danger error-text description_error"></span>
              </div>
            </div> --}}

            <div class="col-md-12">
              <div class="form-group text-center">
                {{-- <label for="image" class="form-control-label mb-1">Vechicle Image: <span class="text-danger">*</span></label> --}}
                <img width="25%"
                    src="{{asset('images/no_image_available.jpg')}}"
                    class="show-photo" id="showPhoto" alt=""
                    title="Brow Image"
                    style="cursor: pointer; border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"
                    >
                <input type="hidden" name="old_image" id="old_image">
                <input type="file" name="school_img" id="school_img" accept="image/x-png,image/png,image/jpg,image/jpeg" class="form-control d-none">
                <span class="text-danger error-text school_img_error"></span>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          @include('backend.templates.button')
        </div>
      </form>
    </div>
  </div>
</div>



