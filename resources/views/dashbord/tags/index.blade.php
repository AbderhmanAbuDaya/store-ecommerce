@extends('layouts.admin')
@section('title')
    AllTags
@stop

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> {{__('admin/tag.tags')}} </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/tag.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active">    {{__('admin/tag.tags')}}
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
                                    <h4 class="card-title">   {{__('admin/tag.all tags')}} </h4>
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
                                                <th>{{__('admin/tag.count')}}</th>
                                                <th>{{__('admin/tag.name')}}</th>
                                                <th>{{__('admin/tag.slug name')}}</th>
                                                <th>{{__('admin/tag.operations')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($tags)
                                                @foreach($tags as $tag)
                                                    <tr class="row{{$tag->id}}">
                                                        <td>{{$i++}}</td>
                                                        <td>{{$tag -> name}}</td>
                                                        <td>{{$tag->slug}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.tags.edit',$tag->id)}}"
                                                                   class="btn btn-outline-primary  box-shadow-3 mr-1 mb-1">{{__('admin/tag.update')}}</a>


                                                                <a href="" id="" id_tag="{{$tag->id}}"
                                                                   class="btn btn-outline-danger  box-shadow-3 mr-1 mb-1 deleteButton">{{__('admin/tag.delete')}}</a>


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

@section('scripts')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script>


            $('.deleteButton').click(function(e){
            e.preventDefault();

            var id= $(this).attr('id_tag');

            $.ajax({
                type: 'post',
                url: "{{route('admin.tags.delete')}}",
                data:{
                    '_token':"{{csrf_token()}}",
                    'id_tag':id,
                },

                success: function(data) {
                    if(data.status==true)
                        alert(data.success);
                    $('.row'+data.id).remove();
                        document.getElementById('tagCount').innerText=data.count;

                }

            });
        });

    </script>

@stop

