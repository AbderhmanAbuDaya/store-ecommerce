@extends('layouts.admin')
@section('title')
    AllBrands
@stop

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> قيم خصائص المنتج </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> قيم خصائص المنتج
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">جميع قيم خصائص المنتج  </h4>
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
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <?php $i=0;?>
                                                <th>count</th>
                                                <th>المنتج </th>
                                                <th>الخاصية</th>
                                                <th>القيمة</th>
                                                <th>السعر</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($options)
                                                @foreach($options as $option)
                                                    <tr class="row{{$option->id}}">
                                                        <td>{{$i++}}</td>
                                                        <td>{{$option -> product->name}}</td>
                                                        <td>{{$option -> attribute->name}}</td>
                                                        <td>{{$option ->name}}</td>
                                                        <td>{{$option ->price}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.products.options.edit',$option->id)}}"
                                                                   class="btn btn-outline-primary  box-shadow-3 mr-1 mb-1">تعديل</a>
                                                                <a href="" id="button{{$option->id}}"   id_attribute="{{$option->id}}"
                                                                   class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1 changeButton">
                                                                    @if($option -> is_active == 'not active')
                                                                        تفعيل
                                                                    @else
                                                                        الغاء تفعيل
                                                                    @endif
                                                                </a>


                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@stop

@section('script')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script>


            $('.deleteButton').click(function(e){
            e.preventDefault();

            var id= $(this).attr('id_attribute');

            $.ajax({
                type: 'post',
                url: "{{route('admin.products.attributes.delete')}}",
                data:{
                    '_token':"{{csrf_token()}}",
                    'id_attribute':id,
                },

                success: function(data) {
                    if(data.status==true)
                    $('.row'+data.id).remove();
                        document.getElementById('attributCount').innerText=data.count;

                }

            });
        });

            $('.changeButton').click(function(e){
                e.preventDefault();

                var id= $(this).attr('id_attribute');

                $.ajax({
                    type: 'post',
                    url: "{{route('admin.products.attributes.changeStatus')}}",
                    data:{
                        '_token':"{{csrf_token()}}",
                        'id_attribute':id,
                    },

                    success: function(data) {
                        if(data.status==true) {

                            var a ='button'+id;
                           var  msg=data.msg;
                            document.getElementById(a).innerText=msg;
                            var a ='status'+id;
                            var  msgstatus=data.msgstatus;
                            document.getElementById(a).innerText=msgstatus;

                        }



                    }

                });
            });

    </script>

@stop

