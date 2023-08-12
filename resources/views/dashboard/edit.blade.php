@extends('layouts.index')

@section('title', 'Edit Book:'.$file->name)

@section('content')
<div class="box-content">
    <form action="{{ route('dashboard.update', $file->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="file" name="dropify" id="input-file-now" @class(['dropify', 'is-invalid' => $errors->has('dropify')])>
        @error('dropify')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <br>
        <button type="submit" class="btn btn-success waves-effect btn-block waves-light">Edit</button>
    </form>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugin/dropify/css/dropify.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/plugin/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/fileUpload.demo.min.js') }}"></script>
@endpush
