@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-4">
                <div class="card"><br>
                    <center>
                        <img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->profile_image)) ? url('upload/admin_images/'.$adminData->profile_image) : url('upload/no_image.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Name : {{ $adminData->name }}</h4>
                            <p class="card-title">User Email : {{ $adminData->email }}</p>
                            <p class="card-title">Username : {{ $adminData->username }}</p>
                            <hr>

                            <a href="/admin/editProfile" class="btn btn-primary btn-rounded"><i class="ri-user-line align-middle me-1"></i>Edit Profile</a>
                        </div>
                        </center>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection