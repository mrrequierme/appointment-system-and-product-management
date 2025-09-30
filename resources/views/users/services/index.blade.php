@extends('layouts.authenticated_layout')

@section('content')
    <div class="container h-100 overflow-y-auto">
        <div class="row">

        <div class="col-md-12 col-lg-6 mx-auto">
        <table class="table table-striped mt-5 border">
            <thead>
                <tr class="text-center">
                    <th>Available Services</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr class="text-center">
                        <td class="text-capitalize">{{ $service->services }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
@endsection
