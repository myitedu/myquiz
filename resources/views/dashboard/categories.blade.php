@extends('dashboard.master')
@section('title', 'Welcome to MyQuiz Portal!')
@section('content')
@include('dashboard.header')
<div data-hide_slidebar="{{$hide_slidebar}}" id="my_container" class="container-fluid">
    <div class="row">
        @php
            $col_lg_10 = "col-lg-12";
        @endphp
        @if($hide_slidebar!=1)
            @include('dashboard.sidebar')

            @php
                $col_lg_10 = 'col-lg-10';
			@endphp

        @endif

        <main class="col-md-9 ms-sm-auto {{$col_lg_10}} px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Categories</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary toggle_slidebar">Slidebar</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar" class="align-text-bottom"></span>
                        This week
                    </button>
                </div>
            </div>



            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Questions</th>
                        <th scope="col">Users #</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Created</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{count($category->questions)}}</td>
                        <td>{{count($category->user_answers)}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                                @php
                                    $img = $category->image??"/img/no_image.png";
                                @endphp
                            <img class="category_img" src="{{$img}}" alt="img">
                        </td>
                        <td>{{$category->created_at}}</td>
                        <td>
                            <a class="btn btn-success" href="#">New Question</a>
                            <a class="btn btn-info" href="#">Update</a>
                            <a class="btn btn-danger" href="#">Delete</a>
                        </td>
                    </tr>
                @endforeach

                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@include('dashboard.scripts')
<style>
    .category_img{
        width: 100px;
        height: 60px;
    }
</style>

<script>
    $(function () {
        $(".toggle_slidebar").click(function () {
            let hide_slidebar = $("#my_container").data('hide_slidebar');
            if (hide_slidebar=='1') {
                document.location = "/dashboard/categories";
            }else{
                document.location = "/dashboard/categories?hide_slidebar=1";
            }
        });
    })
</script>
@stop
