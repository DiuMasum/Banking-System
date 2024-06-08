@extends('admin.layouts.template')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Bank /</span>Create New Bank</h4>

            <div class="row">
                <div class="col-md-12">

                    <div class="card mb-4">
                        <h5 class="card-header">Bank Details</h5>

                        <hr class="my-0" />
                        <div class="card-body">
                            <form action="{{ route('storebank') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">Bank Name</label>
                                        <input class="form-control" type="text" id="bank_name" name="bank_name"
                                             autofocus />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="lastName" class="form-label">Bank Address</label>
                                        <input class="form-control" type="text" name="address" id="address"
                                            />
                                    </div>


                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Add Bank</button>
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
