@extends('layouts.dashboardmaster')

@section('content')
    <!-- start page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                        <h4>SliderBanner Table</h4>
                        <button onclick="window.location.href='{{ route('sliderItem.create') }}'" type="button"
                            class="btn btn-info waves-effect waves-light">Add Banner</button>
                    </div>

                    <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Title</th>
                                <th>Background Image</th>
                                <th>Shape Image</th>
                                <th>Created By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($sliderItems as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        {{ $item->title }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/blog') }}/{{ $item->background_image }}"
                                            style="width: 80px; height:80px;">
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/blog') }}/{{ $item->shape_image }}"
                                            style="width: 80px; height:80px;">
                                    </td>
                                    <td>{{ $value->status }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>
                                        <a href="{{ route('sliderItem.edit', $value->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bx bx-file"></i> Edit</a>
                                        <form action="{{ route('sliderItem.destroy', $value->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')"> <i class="mdi mdi-trash-can"></i>
                                                Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-danger text-center">No Slider Banner Found!</td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
@endsection

@section('script')
    @if (session('success'))
        <script>
            Toastify({
                text: "{{ session('success') }}",
                duration: 5000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                onClick: function() {} // Callback after click
            }).showToast();
        </script>
    @endif
@endsection
