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

                                    <div class="card" >
                                        <div class="card-header">
                                            <h4 class="card-title">Products</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <ul class="nav nav-tabs nav-linetriangle nav-justified">
                                                    <li class="nav-item">
                                                        <a class="nav-link
                                                        @if(Session::has('howActive'))
                                                        @if(Session::get('howActive')==0)
                                                        active
                                                        @endif
                                                            @else
                                                            active
                                                        @endif" id="activeIcon22-tab1" data-toggle="tab" href="#activeIcon22" aria-controls="activeIcon22" aria-expanded="true"><i class="ft-heart"></i> GENERAL INFERMATION`</a>

                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link
                                                        @if(Session::has('howActive'))
                                                        @if(Session::get('howActive')==3)
                                                            active
@endif

                                                        @endif" id="activeIconImages-tab1" data-toggle="tab" href="#activeIconImages" aria-controls="activeIconImages" aria-expanded="true"><i class="ft-heart"></i> ADD IMAGES</a>

                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link  @if(Session::has('howActive'))
                                                        @if(Session::get('howActive')==1)
                                                        active
                                                        @endif


                                                        @endif" id="linkIcon22-tab1" data-toggle="tab" href="#linkIcon22" aria-controls="linkIcon22" aria-expanded="false"><i class="ft-link"></i> Price</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link  @if(Session::has('howActive'))
                                                        @if(Session::get('howActive')==2)
                                                        active
                                                        @endif
                                                        @endif" id="linkIconOpt21-tab1" data-toggle="tab" href="#linkIconOpt21" aria-controls="linkIconOpt21"><i class="ft-external-link"></i> Manage Store</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content px-1 pt-1">
                                                    <div role="tabpanel" class="tab-pane @if(Session::has('howActive'))
                                                    @if(Session::get('howActive')==0)
                                                        active
                                                        @endif
                                                    @else
                                                        active
                                                    @endif" id="activeIcon22" aria-labelledby="activeIcon22-tab1" aria-expanded="true">
                                                        <   <div class="card-content collapse show">
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


                                                                                        @error('categories')
                                                                                        <span class="text-danger">{{$message['categores']}}</span>
                                                                                        @enderror
                                                                                    </div>
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
                                                                                            @error('tags')
                                                                                            <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>

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
                                                    <div role="tabpanel" class="tab-pane @if(Session::has('howActive'))
                                                    @if(Session::get('howActive')==3)
                                                        active
                                                        @endif
                                                    @else
                                                        active
                                                    @endif" id="activeIconImages" aria-labelledby="activeIconImages-tab1" aria-expanded="true">
                                                          <div class="card-content collapse show">
                                                            <div class="card-body">
                                                                <form class="form" id="imageForm" action="{{route('admin.products.images.database')}}"
                                                                      method="POST"
                                                                      enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="projectinput1"> اختار المنتج -  </label>
                                                                                <select class="form-control" name="id_product" id="id_product">
                                                                                    @isset($data['products'])
                                                                                        @foreach($data['products'] as $product)
                                                                                            <option
                                                                                                value="{{$product->id}}">{{$product->name}}</option>
                                                                                        @endforeach
                                                                                    @endisset
                                                                                </select>
                                                                                @error('id_product')
                                                                                <span class="text-danger">{{$message}}</span>
                                                                                @enderror


                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-body">

                                                                                <h4 class="form-section"><i class="ft-home"></i> صور المنتج </h4>
                                                                                <div class="form-group">
                                                                                    <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                                                                        <div class="dz-message">يمكنك رفع اكثر من صوره هنا</div>
                                                                                    </div>
                                                                                    <br><br>
                                                                                </div>

                                                                                @error('document')
                                                                                <span class="text-danger">{{$message}}</span>
                                                                                @enderror
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
                                                    <div class="tab-pane @if(Session::has('howActive'))
                                                    @if(Session::get('howActive')==1)
                                                        active
                                                        @endif
                                                    @endif" id="linkIcon22" role="tabpanel" aria-labelledby="linkIcon22-tab1" aria-expanded="false">
                                                         <div class="card-content collapse show">
                                                            <div class="card-body">
                                                                <form class="form" action="{{route('admin.products.price.store')}}"
                                                                      method="POST"
                                                                      enctype="multipart/form-data">
                                                                    @csrf


                                                                    <div class="form-body">

                                                                        <h4 class="form-section"><i class="ft-home"></i> بيانات سعر المنتج </h4>


                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="projectinput1"> اختار المنتج -  </label>
                                                                                    <select class="form-control" name="id_product" id="id_product">
                                                                                        @isset($data['products'])
                                                                                        @foreach($data['products'] as $product)
                                                                                                <option
                                                                                                    value="{{$product->id}}">{{$product->name}}</option>
                                                                                            @endforeach
                                                                                        @endisset
                                                                                    </select>
                                                                                    @error('id_product')
                                                                                    <span class="text-danger">{{$message}}</span>
                                                                                    @enderror


                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="projectinput1"> سعر المنتج -  </label>
                                                                                    <input type="number" value="{{ old('price') }}" id="price"
                                                                                           class="form-control"
                                                                                           placeholder="  "
                                                                                           name="price">
                                                                                    @error('price')
                                                                                    <span class="text-danger">{{$message}}</span>
                                                                                    @enderror


                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="projectinput1"> سعر الخاص  -  </label>
                                                                                    <input type="number" value="{{ old('special_price') }}" id="special_price"
                                                                                           class="form-control"
                                                                                           placeholder="  "
                                                                                           name="special_price">
                                                                                    @error('special_price')
                                                                                    <span class="text-danger">{{$message}}</span>
                                                                                    @enderror


                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label for=""> نوع سعر   -  </label>

                                                                                    <select class="select2 form-control " name="special_price_type[]" multiple>
                                                                                        <option value="fixed">fixed</option>
                                                                                        <option value="percent">percent</option>
                                                                                    </select>

                                                                                @error('special_price_type')
                                                                                <span class="text-danger">{{$message}}</span>
                                                                                @enderror

                                                                            </div>
                                                                        </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="projectinput1">  تاريخ البداية  -  </label>
                                                                                    <input type="date" value="{{ old('special_price_start') }}" id="special_price_start"
                                                                                           class="form-control"
                                                                                           placeholder="  "
                                                                                           name="special_price_start">
                                                                                    @error('special_price_start')
                                                                                    <span class="text-danger">{{$message}}</span>
                                                                                    @enderror


                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="projectinput1">  تاريخ النهاية  -  </label>
                                                                                    <input type="date" value="{{ old('special_price_end') }}" id="special_price_end"
                                                                                           class="form-control"
                                                                                           placeholder="  "
                                                                                           name="special_price_end">
                                                                                    @error('special_price_end')
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
                                                                            <i class="la la-check-square-o"></i> حفظ
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane @if(Session::has('howActive'))
                                                    @if(Session::get('howActive')==2)
                                                        active
                                                        @endif
                                                    @endif" id="linkIconOpt21" role="tabpanel" aria-labelledby="linkIconOpt21-tab1" aria-expanded="false">
                                                        <div class="card-content collapse show">
                                                            <div class="card-body">
                                                                <form class="form" action="{{route('admin.products.storeHouse')}}"
                                                                      method="POST"
                                                                      enctype="multipart/form-data">
                                                                    @csrf


                                                                    <div class="form-body">

                                                                        <h4 class="form-section"><i class="ft-home"></i> بيانات ادارة المستودع</h4>


                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="projectinput1"> اختار المنتج -  </label>
                                                                                    <select class="form-control" name="id_product" id="id_product">
                                                                                        @isset($data['products'])
                                                                                            @foreach($data['products'] as $product)
                                                                                                <option
                                                                                                    value="{{$product->id}}">{{$product->name}}</option>
                                                                                            @endforeach
                                                                                        @endisset
                                                                                    </select>
                                                                                    @error('id_product')
                                                                                    <span class="text-danger">{{$message}}</span>
                                                                                    @enderror


                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="projectinput1">  كود المنتج -  </label>
                                                                                    <input type="text" value="{{ old('sku') }}" id="sku"
                                                                                           class="form-control"
                                                                                           placeholder="  "
                                                                                           name="sku">
                                                                                    @error('sku')
                                                                                    <span class="text-danger">{{$message}}</span>
                                                                                    @enderror


                                                                                </div>
                                                                            </div>


                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">    تتبع المستودع -  </label>

                                                                                    <select class="select form-control manage_stock " name="manage_stock" id="manage_stock" >
                                                                                        <option value="1" @if(old('manage_stock')==1) selected @endif>اتاحة التتبع</option>
                                                                                        <option value="0" @if(old('manage_stock')==0) selected @endif>عدم اتاحة التتبع</option>
                                                                                    </select>
                                                                                </div>
                                                                                @error('manage_stock')
                                                                                <span class="text-danger">{{$message}}</span>
                                                                                @enderror

                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">    حالة  المنتج -  </label>

                                                                                    <select class="select form-control " name="in_stock" >
                                                                                        <option value="1" @if(old('in_stock')==1) selected @endif> متاح</option>
                                                                                        <option value="0" @if(old('in_stock')==0) selected @endif>  غير متاح</option>
                                                                                    </select>
                                                                                </div>
                                                                                @error('in_stock')
                                                                                <span class="text-danger">{{$message}}</span>
                                                                                @enderror

                                                                            </div>

                                                                            <div class="col-md-6 hidden" id="showData">

                                                                                        <div class="form-group">
                                                                                            <label for="projectinput1">  كمية المنتج -  </label>
                                                                                            <input type="number" value="{{ old('qty') }}" id="qty"
                                                                                                   class="form-control"
                                                                                                   placeholder="  "
                                                                                                   name="qty">
                                                                                            @error('qty')
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
                                                                            <i class="la la-check-square-o"></i> حفظ
                                                                        </button>
                                                                    </div>


                                                                </form>

                                                                        </div>
                                                                    </div>






                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                            </div>

                </section></div>

                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

    <script>


    $('.manage_stock').on('change',function (){

        var value=  $('.manage_stock').val();

           if(value=='1')
               $('#showData').removeClass('hidden');
          else
               $('#showData').addClass('hidden');

        });
    var value=  $('#manage_stock').val();
    if(value =='1') {

        $('#showData').removeClass('hidden');
    }else{
        $('#showData').addClass('hidden');

    }







    var uploadedDocumentMap = {}
    Dropzone.options.dpzMultipleFiles = {
        paramName: "dzfile", // The name that will be used to transfer the file
        //autoProcessQueue: false,
        maxFilesize: 5, // MB
        clickable: true,
        addRemoveLinks: true,
        acceptedFiles: 'image/*',
        dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
        dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
        dictCancelUpload: "الغاء الرفع ",
        dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
        dictRemoveFile: "حذف الصوره",
        dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هضا ",
        headers: {
            'X-CSRF-TOKEN':
                "{{ csrf_token() }}"
        }
        ,
        url: "{{ route('admin.products.images') }}", // Set the url
        success:
            function (file, response) {
                $('#imageForm').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            }
        ,
        removedfile: function (file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }


            $('#imageForm').find('input[name="document[]"][value="' + name + '"]').remove()

        }
        ,
        // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
        init: function () {
            @if(isset($event) && $event->document)
            var files =
            {!! json_encode($event->document) !!}
                for (var i in files) {
                var file = files[i]
                this.options.addedfile.call(this, file)
                file.previewElement.classList.add('dz-complete')
                $('#imageForm').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
            }
            @endif
        }
    }
    </script>
    @stop
