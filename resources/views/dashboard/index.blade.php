@extends('layouts.index')

@section('title', 'Activity')

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('info'))
        <div class="alert alert-info" role="alert">
            {{ session('info') }}
        </div>
    @endif

    <div class="box-content">
        <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="dropify" id="input-file-now" @class(['dropify', 'is-invalid' => $errors->has('dropify')])>
            @error('dropify')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <br>
            <button type="submit" class="btn btn-success waves-effect btn-block waves-light">Create</button>
        </form>
    </div>

    <div id="example-edit_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-12">
                <table id="example-edit" class="display dataTable" style="width: 100%; cursor: pointer;" role="grid"
                    aria-describedby="example-edit_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example-edit" rowspan="1"
                                colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                style="width: 100px;">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example-edit" rowspan="1" colspan="1"
                                aria-label="Age: activate to sort column ascending" style="width: 29px;">Size</th>
                            <th class="sorting" tabindex="0" aria-controls="example-edit" rowspan="1" colspan="1"
                                aria-label="Start date: activate to sort column ascending" style="width: 30px;">extinsion
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example-edit" rowspan="1" colspan="3"
                                aria-label="Position: activate to sort column ascending" style="width: 50px;">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Name</th>
                            <th rowspan="1" colspan="1">Size</th>
                            <th rowspan="1" colspan="1">extinsion</th>
                            <th rowspan="1" colspan="3">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($files as $file)
                            <tr role="row" class="odd">
                                <td class="sorting_1" tabindex="1">{{ $file->name }}</td>
                                <td>{{ number_format($file->size / 1024 / 1024, 1) }} MB</td>
                                <td tabindex="1">{{ $file->extinsion }}</td>
                                <td tabindex="1">
                                    <a href="{{ route('dashboard.edit', $file->id) }}"
                                        class="btn btn-warning btn-xs waves-effect waves-light">Edit</a>
                                </td>
                                <td tabindex="1">
                                    <a href="{{ route('dashboard.show', $file->id) }}"
                                        class="btn btn-success btn-xs waves-effect waves-light">Show</a>
                                </td>
                                <td tabindex="1">
                                    <form action="{{ route('dashboard.destroy', $file->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-xs waves-effect waves-light">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugin/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush
@push('scripts')
    <!-- Data Tables -->
    <script src="{{ asset('assets/plugin/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/editable-table/mindmup-editabletable.js') }}"></script>
    <script src="{{ asset('assets/scripts/datatables.demo.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/fileUpload.demo.min.js') }}"></script>
@endpush
