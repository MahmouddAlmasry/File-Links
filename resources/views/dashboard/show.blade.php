@extends('layouts.index')

@section('content')
    <div id="example-edit_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <li>Name: {{$file->name}}</li>
                    <li>Extinsion: {{$file->extinsion}}</li>
                    <li>Size: {{ number_format($file->size / 1024 / 1024, 1) }} MB</li>
                    <li>Code: {{$file->code}}</li>
                </ul>
            </div>
            <div class="col-8">
                Invitation_link: <a href="{{$invitation_link}}">{{$invitation_link}}</a>
            </div>
        </div>
    </div>
@endsection
