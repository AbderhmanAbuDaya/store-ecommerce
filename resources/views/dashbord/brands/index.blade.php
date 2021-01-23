@extends('layouts.admin')
@section('title')
    AllBrands
@stop

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> المركات التجارية </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">  المركات التجارية
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
                                    <h4 class="card-title">جميع  المركات التجارية  </h4>
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
                                            class="table display nowrap  table-bordered table-responsive">
                                            <thead class="">
                                            <tr>
                                                <?php $i=0;?>
                                                <th>count</th>
                                                <th>الاسم </th>
                                                <th>الصورة </th>
                                                <th>الحالة</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($brands)
                                                @foreach($brands as $brand)
                                                    <tr class="row{{$brand->id}}">
                                                        <td>{{$i++}}</td>
                                                        <td>{{$brand -> name}}</td>
                                                        <td>
                                                            <img style="width: 150px; height: 100px;" src="

                                                   @if($brand->photo=='*//lorempixel/*')
                                                                {{$brand->photo}}
                                                            @else
                                                  {{asset('assets/images/brands/'.$brand->photo)}}
                                                                @endif
                                                                "></td>
                                                        <td id="status{{$brand->id}}">{{$brand -> is_active}}</td>

                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.brands.edit',$brand->id)}}"
                                                                   class="btn btn-outline-primary  box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                <a href="" id="" id_brand="{{$brand->id}}"
                                                                   class="btn btn-outline-danger  box-shadow-3 mr-1 mb-1 deleteButton">حذف</a>


                                                                <a href="" id="button{{$brand->id}}"   id_brand="{{$brand->id}}"
                                                                   class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1 changeButton">
                                                                    @if($brand -> is_active == 'not active')
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
                                            <tfoot>
                                            {!! $brands->links() !!}
                                            </tfoot>
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

@section('scripts')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script>


            $('.deleteButton').click(function(e){
            e.preventDefault();

            var id= $(this).attr('id_brand');

            $.ajax({
                type: 'post',
                url: "{{route('admin.brands.delete')}}",
                data:{
                    '_token':"{{csrf_token()}}",
                    'id_brand':id,
                },

                success: function(data) {
                    if(data.status==true)
                        alert(data.success);
                    $('.row'+data.id).remove();
                        document.getElementById('brandCount').innerText=data.count;

                }

            });
        });

            $('.changeButton').click(function(e){
                e.preventDefault();

                var id= $(this).attr('id_brand');

                $.ajax({
                    type: 'post',
                    url: "{{route('admin.brands.changeStatus')}}",
                    data:{
                        '_token':"{{csrf_token()}}",
                        'id_brand':id,
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

