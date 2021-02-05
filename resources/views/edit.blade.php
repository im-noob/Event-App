@extends('parent')
@section('content')
    <H1>Edit Event</H1>
    <form method="post" action="{{route('event.update',$event->id)}}">
        @csrf
        @method('PUT')
        <label>
            Event Title
            <input name="name" type="text" value="{{$event->name}}">
        </label>
        <br>
        <label>
            Start Date
            <input name="start_date" type="date" value="{{$event->start_date}}">
        </label>
        <br>
        <label>
            End Date
            <input name="end_date" type="date" value="{{$event->end_date}}">
        </label>
        <br>
        Recurrence:
        <label>
            Repeat:
            <input name="type" type="radio" value="type_1" {{$event->type == 'type_1' ? 'checked' : ''}} >
            <input type="hidden" name="type_1_occ_type_1" value="0">
            <select id="lstRepeatType" class="textbox-medium"
                    name="type_1_occ_type_2" style="font-size: x-small; width: 100px; font-family: Verdana"
                    tabindex="10">
                <option value="1" {{$event->occ_type_2 == 1? 'selected' : ''}} >Every</option>
                <option value="2" {{$event->occ_type_2 == 2? 'selected' : ''}} >Every Other</option>
                <option value="3" {{$event->occ_type_2 == 3? 'selected' : ''}} >Every Third</option>
                <option value="4" {{$event->occ_type_2 == 4? 'selected' : ''}} >Every Fourth</option>
            </select>
            <select id="type_1_occ_type_3" class="textbox-medium" name="type_1_occ_type_3" style="font-size: x-small;
                            width: 66px; font-family: Verdana" tabindex="10">
                <option selected="selected" value="1" {{$event->occ_type_3 == 1? 'selected' : ''}}>Day</option>
                <option value="2" {{$event->occ_type_3 == 2? 'selected' : ''}}>Week</option>
                <option value="3" {{$event->occ_type_3 == 3? 'selected' : ''}}>Month</option>
                <option value="4" {{$event->occ_type_3 == 4? 'selected' : ''}}>Year</option>
            </select>

        </label>
        <br>
        <label>
            Repeat on the :
            <input name="type" type="radio" value="type_2" {{$event->type == 'type_2' ? 'checked' : ''}}>
            <select id="lstRepeatOn" class="textbox-middle" name="type_2_occ_type_1" style="font-size: x-small;
                        width: 68px; font-family: Verdana" tabindex="12">
                <option selected="selected" value="1" {{$event->occ_type_1 == 1? 'selected' : ''}}>First</option>
                <option value="2" {{$event->occ_type_1 == 2? 'selected' : ''}}>Second</option>
                <option value="3" {{$event->occ_type_1 == 3? 'selected' : ''}}>Third</option>
                <option value="4" {{$event->occ_type_1 == 4? 'selected' : ''}}>Fourth</option>
            </select>
            </span>&nbsp;
            <select id="lstRepeatWeek" class="textbox-middle" name="type_2_occ_type_2"
                    style="font-size: x-small; width: 56px; font-family: Verdana" tabindex="13">
                <option selected="selected" value="0" {{$event->occ_type_2 == 0? 'selected' : ''}}>Sun</option>
                <option value="1" {{$event->occ_type_2 == 1? 'selected' : ''}}>Mon</option>
                <option value="2" {{$event->occ_type_2 == 2? 'selected' : ''}}>Tue</option>
                <option value="3" {{$event->occ_type_2 == 3? 'selected' : ''}}>Wed</option>
                <option value="4" {{$event->occ_type_2 == 4? 'selected' : ''}}>Thu</option>
                <option value="5" {{$event->occ_type_2 == 5? 'selected' : ''}}>Fri</option>
                <option value="6" {{$event->occ_type_2 == 6? 'selected' : ''}}>Sat</option>
            </select>
            of the
            <select id="lstRepeatMonth" class="textbox-middle" language="javascript" name="type_2_occ_type_3"
                    style="font-size: x-small; width: 80px;
                        font-family: Verdana" tabindex="14">
                <option selected="selected" value="1" {{$event->occ_type_3 == 1? 'selected' : ''}}>Month</option>
                <option value="3" {{$event->occ_type_3 == 3? 'selected' : ''}}>3 Months</option>
                <option value="4" {{$event->occ_type_3 == 4? 'selected' : ''}}>4 Months</option>
                <option value="6" {{$event->occ_type_3 == 6? 'selected' : ''}}>6 Months</option>
                <option value="12" {{$event->occ_type_3 == 12? 'selected' : ''}}>Year</option>
            </select>
        </label>
        <br>
        <input type="submit" value="Save">
    </form>

@endsection
