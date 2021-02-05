@extends('parent')
@section('content')
    <H1>Add Event</H1>
    <form method="post" action="{{route('event.store')}}">
        @csrf
        <label>
            Event Title
            <input name="name" type="text">
        </label>
        <br>
        <label>
            Start Date
            <input name="start_date" type="date">
        </label>
        <br>
        <label>
            End Date
            <input name="end_date" type="date">
        </label>
        <br>
        Recurrence:
        <label>
            Repeat:
            <input name="type" type="radio" value="type_1">
            <input type="hidden" name="type_1_occ_type_1" value="0">
            <select id="lstRepeatType" class="textbox-medium"
                    name="type_1_occ_type_2" style="font-size: x-small; width: 100px; font-family: Verdana"
                    tabindex="10">
                <option selected="selected" value="1">Every</option>
                <option value="2">Every Other</option>
                <option value="3">Every Third</option>
                <option value="4">Every Fourth</option>
            </select>
            <select id="type_1_occ_type_3" class="textbox-medium" name="type_1_occ_type_3" style="font-size: x-small;
                            width: 66px; font-family: Verdana" tabindex="10">
                <option selected="selected" value="1">Day</option>
                <option value="2">Week</option>
                <option value="3">Month</option>
                <option value="4">Year</option>
            </select>

        </label>
        <br>
        <label>
            Repeat on the :
            <input name="type" type="radio" value="type_2">
            <select id="lstRepeatOn" class="textbox-middle" name="type_2_occ_type_1" style="font-size: x-small;
                        width: 68px; font-family: Verdana" tabindex="12">
                <option selected="selected" value="1">First</option>
                <option value="2">Second</option>
                <option value="3">Third</option>
                <option value="4">Fourth</option>
            </select>
            </span>&nbsp;
            <select id="lstRepeatWeek" class="textbox-middle" name="type_2_occ_type_2"
                                 style="font-size: x-small; width: 56px; font-family: Verdana" tabindex="13">
                <option selected="selected" value="0">Sun</option>
                <option value="1">Mon</option>
                <option value="2">Tue</option>
                <option value="3">Wed</option>
                <option value="4">Thu</option>
                <option value="5">Fri</option>
                <option value="6">Sat</option>
            </select>
            of the
            <select id="lstRepeatMonth" class="textbox-middle" language="javascript" name="type_2_occ_type_3"
                    style="font-size: x-small; width: 80px;
                        font-family: Verdana" tabindex="14">
                <option selected="selected" value="1">Month</option>
                <option value="3">3 Months</option>
                <option value="4">4 Months</option>
                <option value="6">6 Months</option>
                <option value="12">Year</option>
            </select>
        </label>
        <br>
        <input type="submit">
    </form>

@endsection
