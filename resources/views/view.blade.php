@extends('parent')
@section('content')
    <h1>Event View Page</h1>
    <h2>{{$event->name}}</h2>
    <table>
        <tr>
            <td width="20">
                <strong>#</strong>
            </td>
            <td width="150">
                <strong>Day Name</strong>
            </td>
            <td width="250">
                <strong>Dates</strong>
            </td>
            </td>
        </tr>

            @forelse($period_list as $key=>$one_period)
            <tr>
                <td>
                    {{$key+1}}
                </td>
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
