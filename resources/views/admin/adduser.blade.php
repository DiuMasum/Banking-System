@extends('admin.layouts.template')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add User /</span>Create New Bank Account</h4>

            <div class="row">
                <div class="col-md-12">

                    <div class="card mb-4">
                        <h5 class="card-header">Profile Details</h5>

                        <hr class="my-0" />
                        <div class="card-body">
                            <form action="{{ route('storeuser') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">Name</label>
                                        <input class="form-control" type="text" id="name" name="name"
                                             autofocus />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="lastName" class="form-label">Mobile</label>
                                        <input class="form-control" type="text" name="mobile" id="mobile"
                                            />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input class="form-control" type="email" id="email" name="email"
                                             />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="organization" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                             />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="organization" class="form-label">Mothers Name</label>
                                        <input type="text" class="form-control" id="mothers_name" name="mothers_name"
                                             />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="address" class="form-label">Fathers Name</label>
                                        <input type="text" class="form-control" id="fathers_name" name="fathers_name"
                                            />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="state" class="form-label">Date of Birth</label>
                                        <input class="form-control" type="text" id="dob" name="dob"
                                             />
                                    </div>

                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                </div>
                            </form>
                        </div>
                        <!-- /Account -->
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->


        <div class="content-backdrop fade"></div>
    </div>
@endsection
