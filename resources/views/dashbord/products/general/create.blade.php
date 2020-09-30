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
                                <li class="breadcrumb-item"><a href=""> اضافة معلومات عن المنتجات </a>
                                </li>
                                <li class="breadcrumb-item active">اضافة معلومات عن المنتجات
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
                                    <h4 class="card-title" id="basic-layout-form">اضافة معلومات عن المنتجات </h4>
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
                                        <form class="form" action="{{route('admin.products.general.store')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
{{--                                            <div class="form-group">--}}
{{--                                                <label> صورة الماركة </label>--}}
{{--                                                <label id="projectinput7" class="file center-block">--}}
{{--                                                    <input type="file" id="file" name="photo">--}}
{{--                                                    <span class="file-custom"></span>--}}
{{--                                                </label>--}}
{{--                                                @error('photo')--}}
{{--                                                <span class="text-danger">{{$message}}</span>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> بيانات القسم </h4>


                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1"> اسم المنتج -  </label>
                                                                    <input type="text" value="{{ old('name') }}" id="name"
                                                                           class="form-control"
                                                                           placeholder="  "
                                                                           name="name">
                                                                    @error('name')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror


                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1"> اسم بالرابط -  </label>
                                                                    <input type="text" value="{{ old('slug') }}" id="slug"
                                                                           class="form-control"
                                                                           placeholder="  "
                                                                           name="slug">
                                                                    @error('slug')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">  وصف المنتج -  </label>
                                                                    <textarea type="text" value="" id="description"
                                                                           class="ckeditor  form-control"
                                                                           placeholder="  "
                                                                           name="description">{{old('description')}}
                                                                    </textarea>
                                                                    @error('description')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">  وصف المختصر -  </label>
                                                                    <textarea type="text"  id="short_description"
                                                                           class="ckeditor  form-control"
                                                                           placeholder="  "
                                                                           name="short_description">{{old('short_description')}}
                                                                    </textarea>
                                                                    @error('short_description')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>

                                                            </div>
                                                         <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">  الاقسام  التجارية  </label>

                                                                            <select class="select2   form-control" name="categories[]" multiple>
                                                                                <option value="{{null}}"></option>
                                                                                @foreach($data['categories'] as $categoty)
                                                                                    <option value="{{$categoty->id}}">{{$categoty->name}}</option>
                                                                                @endforeach
                                                                            </select>

                                                                              </div>
                                                                        @error('categories')
                                                                        <span class="text-danger">{{$message['categores']}}</span>
                                                                        @enderror
                                                                    </div>



{{--                                                                                                                                                <div class="form-group   ">
                                                                                <label for="">  العلامات التجارية  </label>

                                                                                <select class="select2 form-control select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
                                                                                    <option value="{{null}}"></option>
                                                                                    @foreach($data['tags'] as $tag)
                                                                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <span class="select2 select2-container select2-container--default select2-container--below select2-container--focus" dir="ltr" style="width: 456.703px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-selection__choice" title="Alaska"><span class="select2-selection__choice__remove" role="presentation">×</span>Alaska</li><li class="select2-selection__choice" title="California"><span class="select2-selection__choice__remove" role="presentation">×</span>California</li><li class="select2-selection__choice" title="Colorado"><span class="select2-selection__choice__remove" role="presentation">×</span>Colorado</li><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

                                                                                @error('tag_id')
                                                                                <span class="text-danger">{{$message}}</span>
                                                                                @enderror

                                                                            </div>
--}}
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="">  العلامات التجارية  </label>

                                                                                <select class="select2 form-control" name="tags[]" multiple>
                                                                                    <option value="{{null}}"></option>
                                                                                    @foreach($data['tags'] as $tag)
                                                                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            @error('tags')
                                                                            <span class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                            <div class="col-md-4">

                                                                                <div class="form-group   ">
                                                                                    <label for="">   الماركة التجارية </label>
                                                                                    <select class="form-control form-control-sm" name="brand_id">
                                                                                        <option value="{{null}}"></option>
                                                                                        @foreach($data['brands'] as $brand)
                                                                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('brand_id')
                                                                                    <span class="text-danger">{{$message}}</span>
                                                                                    @enderror

                                                                                </div>
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
                                                                                   class="card-title ml-1">الحالة   </label>


                                                                        </div>
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
                                                    <i class="la la-check-square-o"></i> حفظ
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
