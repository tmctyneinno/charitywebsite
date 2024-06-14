@extends('admin.layouts.admin')
@section('content')
    <!-- begin::page-header -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action='{{ route('admin.teams.update', encrypt($team->id)) }}' method='post', enctype='multipart/form-data'>
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Company Team Members</h6>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Enter Title"
                                            value="{{ $team->name}}"
                                            class="form-control @error('name') is-invalid @enderror">
                                        <small id="emailHelp" class="form-text text-muted">Title
                                        </small>
                                        @error('name')
                                            <span class="invalid-feedback"> <small> * </small> </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="position" placeholder="Enter content"
                                            value="{{ $team->position}}"
                                            class="form-control @error('position') is-invalid @enderror">
                                        <small id="emailHelp" class="form-text text-muted">Enter Position
                                        </small>
                                        @error('position')
                                            <span class="invalid-feedback"> <small> * </small> </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group"> 
                                        <img src="{{asset('images/'.$team->image)}}" width="100px">
                                        <input type="file" name="image" placeholder="Type Icon"
                                            value="{{ old('image') }}"
                                            class="form-control @error('image') is-invalid @enderror">
                                        <small id="emailHelp" class="form-text text-muted">Select Image
                                        </small>
                                        @error('image')
                                            <span class="invalid-feedback"> <small> * </small> </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea id="summernote" name="about" class="form-control @error('about') is-invalid @enderror">
                                    {{ $team->about }}
                                  </textarea>
                                        <small id="emailHelp" class="form-text text-muted">Enter Brief Bio
                                        </small>
                                        @error('about')
                                            <span class="invalid-feedback"> <small> * </small> </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <div class="p-5">
                                        <button type="submit" class=" btn btn-primary w-10 p-3 ">Update Team Member</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.clockpicker-example').clockpicker({
            autoclose: true
        });

        $('input[name="audition_date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        });

        let message = {!! json_encode(Session::get('message')) !!};
        let msg = {!! json_encode(Session::get('alert')) !!};
        //alert(msg);
        toastr.options = {
            timeOut: 3000,
            progressBar: true,
            showMethod: "slideDown",
            hideMethod: "slideUp",
            showDuration: 200,
            hideDuration: 200
        };
        if (message != null && msg == 'success') {
            toastr.success(message);
        } else if (message != null && msg == 'error') {
            toastr.error(message);
        }
    </script>
@endsection
