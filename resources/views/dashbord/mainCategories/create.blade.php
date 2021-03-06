@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">{{__('admin/category.home')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="">{{__('admin/category.'.$type.'Categories')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/category.add '.$type.' category')}}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{__('admin/category.add '.$type.' category')}} </h4>
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
                                        <form class="form" action="{{route('admin.mainCategories.stroe')}}"
                                              method="POST"
                                              id="creatForm"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>{{__('admin/category.category image')}} </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> {{__('admin/category.category data')}} </h4>


                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1"> {{__('admin/category.category name')}} -  </label>
                                                                    <input type="text" value="{{ old('name') }}" id="name"
                                                                           class="form-control"
                                                                           placeholder="  "
                                                                           name="name">
                                                                    @error('name')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror


                                                                </div>
                                                            </div>


                                                            <div class="col-md-6 ">
                                                                <div class="form-group">
                                                                    <label for="projectinput1"> {{__('admin/category.category slug')}} </label>
                                                                    <input type="text" id="abbr"
                                                                           class="form-control"
                                                                           placeholder="  "
                                                                           value="{{old('slug')}}"
                                                                           name="slug">
                                                                    @error('slug')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 ">
                                                                <div class="row hidden listCategories">
                                                                    <div class="col-md-12">
                                                                <div class="form-group   ">
                                                                    <label for=""> {{__('admin/category.main category')}} </label>
                                                                    <select class="form-control form-control-sm" name="parent_id">
                                                                        <option value="{{null}}"></option>
                                                                    @foreach($categories as $category)
                                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('mainCategory')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror

                                                                </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 mt-3">
                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <input id="radio_Categories"  type="radio" name="parentID" value="1">
                                                                        <label for="">{{__('admin/category.main')}}</label>

                                                                    </div>


                                                                    <div class="col-md-6">
                                                                        <input type="radio" id="radio_subCategories" name="parentID" value="2">
                                                                        <label for="">{{__('admin/category.sub')}}</label>

                                                                    </div>
                                                                    @error('parentID')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror


                                                                </div>


                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mt-1">
                                                                    <input type="checkbox" value="1"
                                                                           name="is_active"
                                                                           id="switcheryColor4"
                                                                           class="switchery" data-color="success"
                                                                           checked/>
                                                                    <label for="switcheryColor4"
                                                                           class="card-title ml-1">{{__('admin/category.state')}}   </label>


                                                                </div>
                                                            </div>
                                                        </div>

                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{__('admin/category.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/category.save')}}
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

@stop


@section('script')


    <script>
       var $zz=$("input[name='parentID']");
       $zz.on('change', function() {

           if ($("input[name='parentID']:checked").val() == 1) {
               var $listCategories = $('.listCategories');

               $listCategories.addClass('hidden');
           }


      if($("input[name='parentID']:checked").val()==2) {
          var $listCategories = $('.listCategories');
          $listCategories.removeClass('hidden');


      }


       });


    </script>



    @stop
