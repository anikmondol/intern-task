@extends('layouts.dashboardmaster')

@section('content')
    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header text-white" style="background: #0C4A6E">
                        <h4 class="mb-0 text-white text-center">Create Your Profile</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text" name="full_name" id="full_name"
                                    class="form-control @error('full_name') is-invalid @enderror"
                                    value="{{ old('full_name', $profile->full_name ?? '') }}">
                                @error('full_name')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $customer->email ?? '') }}">
                                @error('email')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" id="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $profile->phone ?? '') }}">
                                @error('phone')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" id="address"
                                    class="form-control @error('address') is-invalid @enderror"
                                    value="{{ old('address', $profile->address ?? '') }}">
                                @error('address')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea name="bio" id="bio" rows="3" class="form-control @error('bio') is-invalid @enderror">{{ old('bio', $profile->bio ?? '') }}</textarea>
                                @error('bio')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="profile_image" class="form-label">Profile Image</label>
                                <input type="file" name="profile_image" id="profile_image"
                                    class="form-control @error('profile_image') is-invalid @enderror"
                                    accept="image/png, image/jpeg">
                                @if (!empty($profile->profile_image))
                                    <p class="mt-2">
                                        <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="Profile Image"
                                            width="80">
                                    </p>
                                @endif
                                @error('profile_image')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="hobbies" class="form-label">Hobbies</label>
                                <input type="text" name="hobbies" id="hobbies"
                                    class="form-control @error('hobbies') is-invalid @enderror"
                                    value="{{ old('hobbies', $profile->hobbies ?? '') }}">
                                @error('hobbies')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth" id="date_of_birth"
                                    class="form-control @error('date_of_birth') is-invalid @enderror"
                                    value="{{ old('date_of_birth', $profile->date_of_birth ?? '') }}">
                                @error('date_of_birth')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100" style="background: #0C4A6E">
                                {{ $profile ? 'Update Profile' : 'Save Profile' }}
                            </button>
                        </form>






                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
