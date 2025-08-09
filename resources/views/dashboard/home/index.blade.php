@extends('layouts.dashboardmaster')

<style>
    .card {
        box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2);
        border: none;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card .card-body .btn-custom {
        background-color: #003a82;
        color: white;
        border-radius: 20px;
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
</style>

@section('content')
    <div class="container">


        @if ($profile)
            <div class="row align-items-center justify-content-center">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="col-6 col-lg-4 col-xl-4">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{ asset('storage/' . $profile->profile_image) }}"
                            alt="Card image cap">
                        <div class="card-body w-100">
                            <h5 class="card-title d-flex align-items-center justify-content-between">
                                <span>{{ $customer->name }}</span> <span>{{ $customer->email }}</span>
                            </h5>
                            <p class="card-text">{{ $profile->bio }}</p>
                            <a href="{{ route('profile.create_edited') }}"
                                class="btn btn-primary waves-effect waves-light">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row align-items-center justify-content-center">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="col-6 col-lg-4 col-xl-4">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{ asset('dashboard') }}/assets/images/default.jpg"
                            alt="Card image cap">
                        <div class="card-body w-100">
                            <h5 class="card-title d-flex align-items-center justify-content-between">
                                <span>{{ $customer->name }}</span> <span>{{ $customer->email }}</span>
                            </h5>
                            <p class="card-text"> Add Your Data in Profile </p>
                            <a href="{{ route('profile.create_edited') }}"
                                class="btn btn-primary waves-effect waves-light">Create</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif






    </div>
@endsection
