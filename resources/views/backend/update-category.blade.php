@extends('backend.master')
@section('content')

    @section('site-title')
        Admin | Add Post
    @endsection
    @section('page-main-title')
        Update Category
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="/admin/update-category-submit" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        @if (Session::has('message'))
                            <p class="text-primary text-center mt-3 mb-0">{{ Session::get('message') }}</p>
                        @endif
                        <input type="hidden" name="id" value="{{$category[0]->id}}">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Name</label>
                                    <input class="form-control" type="text" value="{{$category[0] -> name}}" name="name" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Update Post">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
