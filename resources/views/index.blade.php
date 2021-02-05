@extends('parent')
@section('content')

    <h1>Event List Page</h1>
    <table class="table table-hover">

        <tr>
            <th scope="col">
                <strong>#</strong>
            </th>
            <th scope="col">
                <strong>Title</strong>
            </th>
            <th scope="col">
                <strong>Dates</strong>
            </th>
            <th scope="col">
                <strong>Occurrence</strong>
            </th>
            <th scope="col">
                <strong>Actions</strong>
            </th>
        </tr>
        @forelse($events as $event)
            <tr>
                <th scope="row">
                    {{$event->id}}
                </th>
                <td>
                    {{$event->name}}
                </td>
                <td>
                    {{$event->start_date}} to {{$event->end_date}}
                </td>
                <td>
                    @if($event->type == 'type_1')
                        @if($event->occ_type_2 == 1)
                            Every
                        @elseif($event->occ_type_2 == 2)
                            Every Other
                        @elseif($event->occ_type_2 == 3)
                            Every Third
                        @elseif($event->occ_type_2 == 4)
                            Every Fourth
                        @endif


                        @if($event->occ_type_3 == 1)
                            Day
                        @elseif($event->occ_type_3 == 2)
                            Week
                        @elseif($event->occ_type_3 == 3)
                            Month
                        @elseif($event->occ_type_3 == 4)
                            Year
                        @endif
                    @else
                        @if($event->occ_type_1 == 1)
                            First
                        @elseif($event->occ_type_1 == 2)
                            Second
                        @elseif($event->occ_type_1 == 3)
                            Third
                        @elseif($event->occ_type_1 == 4)
                            Fourth
                        @endif


                        @if($event->occ_type_2 == 1)
                            Mon
                        @elseif($event->occ_type_2 == 2)
                            Tue
                        @elseif($event->occ_type_2 == 3)
                            Wed
                        @elseif($event->occ_type_2 == 4)
                            Thu
                        @elseif($event->occ_type_2 == 5)
                            Fri
                        @elseif($event->occ_type_2 == 6)
                            Sat
                        @endif

                        of the

                        @if($event->occ_type_3 == 1)
                            Month
                        @elseif($event->occ_type_3 == 3)
                            3 Months
                        @elseif($event->occ_type_3 == 4)
                            4 Months
                        @elseif($event->occ_type_3 == 6)
                            6 Months
                        @elseif($event->occ_type_3 == 12)
                            Year
                        @endif

                    @endif
                </td>
                <td>
                    <a class="btn btn-primary" href="{{route('event.show',$event->id)}}">View</a>
                    <a class="btn btn-success" href="{{route('event.edit',$event->id)}}">Edit</a>
                    <form method="POST" action="{{route('event.destroy',$event->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @empty
            <h1>No Records</h1>

        @endforelse
    </table>
@endsection
