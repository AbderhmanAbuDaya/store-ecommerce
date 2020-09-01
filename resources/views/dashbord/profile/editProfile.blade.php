@extends('layouts.admin')

@section('content')

<div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="">المتاجر </a>
                                </li>
                                <li class="breadcrumb-item active">  الملف الشخصي
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> {{__('admin/profile.setting profile')}} </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('dashbord.includes.alerts.success')
                                @include('dashbord.includes.alerts.errors')
                                <div class="card-content collapse show">
                                <div class="card-body">

                                        <form class="form" action="{{route('update.profile')}}"
                                              method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{$admin ->id}}">

                                            <div class="form-body">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{__('admin/profile.name')}} </label>
                                                            <input type="text" value="{{$admin ->name  }}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                         <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> {{__('admin/profile.email')}}  </label>
                                                                <input type="email" value="{{$admin ->email}}" id="email"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="email">
                                                                @error("email")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{__('admin/profile.setting new password')}}  </label>
                                                            <input type="password"  id="newPassword"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="password">
                                                            @error("password")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{__('admin/profile.setting confirm new password')}}  </label>
                                                            <input type="password"  id="newConfirmPassword"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="password_confirmation">

                                                        </div>
                                                    </div>


                                                 </div>


                                            </div>

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{__('admin/shipping.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/shipping.save')}}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript">
        {{--$(document).on('click','#lastPassword',function(){--}}
        {{--   --}}


        {{--    $.ajax({--}}
        {{--        type: 'post',--}}
        {{--        url: "{{route('check.password')}}",--}}
        {{--        data: {--}}
        {{--            'admin_id':$("input[name=admin_id]").val(),--}}
        {{--            'last_password':$("input[name=lastPassword]").val(),--}}

        {{--        },--}}


        {{--        success: function(data) {--}}
        {{--            if(data.status==true)--}}
        {{--                alert(data.success);--}}


        {{--        },error: function(reject) {--}}
        {{--            // var response=$.parseJSON(reject.responseText);--}}
        {{--            // $.each(response.errors,function(key,val){--}}
        {{--            //     $("#" + key + "_error").text(val[0]);--}}


        {{--        }--}}

        {{--    });--}}
        {{--});--}}

    </script>

@stop
