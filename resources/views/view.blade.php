@extends('parent')
@section('content')
    <h1>Event View Page</h1>
    <h2>{{$event->name}}</h2>
    <table class="table table-hover">
        <tr>
            <th scope="col">
                <strong>#</strong>
            </th>
            <th scope="col">
                <strong>Day Name</strong>
            </th>
            <th scope="col">
                <strong>Dates</strong>
            </th>
        </tr>

            @forelse($period_list as $key=>$one_period)
            <tr>
                <th scope="row">
                    {{$key+1}}
                </th>
                <td>
                    {{$one_period->format('d m Y')}}
                </td>
                <td>
                    {{$one_period->format('D')}}
                </td>
            </tr>
            @empty
                <h5>No Occurrence</h5>
            @endforelse

    </table>
    <h4>Total Recurrence Event: {{sizeof($period_list)}}</h4>
@endsection
