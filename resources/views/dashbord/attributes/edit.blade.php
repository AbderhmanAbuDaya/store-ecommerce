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
                                <li class="breadcrumb-item"><a href=""> الاقسام الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> تعديل - {{$attribute -> name}}
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
                                    <h4 class="card-title" id="basic-layout-form"> تعديل  خصائص المنتج </h4>
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
                                        <form class="form"
                                              action="{{route('admin.products.attributes.update')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf


                                            <input name="id" value="{{$attribute -> id}}" type="hidden">
                                            <input name="edit" value="{{$attribute -> id}}" type="hidden">
                                            @isset($attribute)
                                               @foreach($attribute->translations as $tran)
                                                   @if($tran->locale==app()->getLocale())
                                                        <input type="hidden" name="id_translation" value="{{$tran->id}}">
                                                    @endif
                                                @endforeach
                                            @endisset



                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> بيانات خصائص المنتج </h4>
                                                <div class="row">


                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> اسم الخاصية -  </label>
                                                                <input type="text" value="{{ $attribute->name   }}" id="name"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="name">
                                                                @error('name')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror


                                                            </div>
                                                        </div>



                                                    </div>
                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> تحديث
                                                </button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection



@section('script')
    <script>

        $(document).on('focus','#data[]',function (){
           alert('aa');
        });

    </script>

    @stop
