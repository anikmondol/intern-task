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

        <div class="row align-items-center justify-content-center">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="col-6 col-lg-4 col-xl-4">
                <!-- Simple card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{ asset('dashboard') }}/assets/images/media/img-1.jpg"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content. With supporting text below as a natural lead-in to additional content.</p>
                        <a href="{{ route('profile.create_edited') }}"
                            class="btn btn-primary waves-effect waves-light">Create</a>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection
