<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href=""><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">{{__('admin/sidbar.home')}} </span></a>
            </li>

            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">لغات الموقع </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href=""
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="" data-i18n="nav.dash.crypto">أضافة
                            لغة جديده </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/sidbar.main category')}}</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Category::parent()->count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.mainCategories','main')}}"
                                          data-i18n="nav.dash.ecommerce"> {{__('admin/sidbar.show all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.mainCategories.create','main')}}" data-i18n="nav.dash.crypto">
                            {{__('admin/sidbar.add main category')}}
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/sidbar.sub category')}}</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Category::sub()->count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.mainCategories','sub')}}"
                                          data-i18n="nav.dash.ecommerce"> {{__('admin/sidbar.show all')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.mainCategories.create','sub')}}" data-i18n="nav.dash.crypto">
                            {{__('admin/sidbar.add main category')}}</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/sidbar.products')}}</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Product::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.products')}}"
                                          data-i18n="nav.dash.ecommerce"> {{__('admin/sidbar.show all')}}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.products.general.create')}}" data-i18n="nav.dash.crypto">{{__('admin/sidbar.add product')}}</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/sidbar.product attribute')}}</span>
                    <span
                     id="attributCount"    class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Attribute::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.products.attributes')}}"
                                    data-i18n="nav.dash.ecommerce"> {{__('admin/sidbar.show all')}} </a>
                    </li>

                    <li><a class="menu-item" href="{{route('admin.products.attributes.create')}}" data-i18n="nav.dash.crypto">
                            {{__('admin/sidbar.add product attribute')}}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/sidbar.value product attribute')}}</span>
                    <span
                        id="attributCount"    class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Option::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.products.options')}}"
                                    data-i18n="nav.dash.ecommerce"> {{__('admin/sidbar.show all')}} </a>
                    </li>

                    <li><a class="menu-item" href="{{route('admin.products.options.create')}}" data-i18n="nav.dash.crypto">
                            {{__('admin/sidbar.add value product attribute')}}</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/sidbar.commercial brands')}} </span>
                    <span
                     id="brandCount"   class="badge badge badge-success badge-pill float-right mr-2 brandCount">{{\App\Models\Brand::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.brands')}}"
                                          data-i18n="nav.dash.ecommerce"> {{__('admin/sidbar.show all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.brands.create')}}" data-i18n="nav.dash.crypto">{{__('admin/sidbar.add commercial brand')}}</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/sidbar.tags')}}  </span>
                    <span  id="tagCount"
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{\App\Models\Tag::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.tags')}}"
                                          data-i18n="nav.dash.ecommerce"> {{__('admin/sidbar.show all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.tags.create')}}" data-i18n="nav.dash.crypto">{{__('admin/sidbar.add tag')}}</a>
                    </li>
                </ul>






            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title"
              data-i18n="nav.templates.main">{{__("admin/sidbar.settinges")}}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="#" data-i18n="nav.templates.vert.main"> {{__('admin/sidbar.Means of delivery')}} </a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{route('edite.shipping.method','free')}}"
                                   data-i18n="nav.templates.vert.classic_menu"> {{__('admin/sidbar.free delivery')}} </a>
                            </li>
                            <li><a class="menu-item" href="{{route('edite.shipping.method','local')}}"> {{__('admin/sidbar.Local delivery')}} </a>
                            </li>
                            <li><a class="menu-item" href="{{route('edite.shipping.method','outer')}}"
                                   data-i18n="nav.templates.vert.compact_menu"> {{__('admin/sidbar.Outer delivery')}}</a>
                            </li>


                        </ul>
                    </li>
                    <li><a class="menu-item" href="#"
                           data-i18n="nav.templates.vert.main"> {{__('admin/sidbar.main slider')}} </a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{route('admin.sliders.create')}}"
                                   data-i18n="nav.templates.vert.classic_menu">{{__('admin/sidbar.image slider')}}</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>

        </ul>
    </div>
</div>
