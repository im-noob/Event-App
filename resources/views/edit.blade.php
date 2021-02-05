@extends('parent')
@section('content')
    <H1>Add Event</H1>
    <label>
        Event Title
        <input name="name" type="text">
    </label>
    <label>
        Start Date
        <input name="start_date" type="date">
    </label>
    <label>
        End Date
        <input name="end_date" type="date">
    </label>
    Recurrence:
    <label>
        Repeat:
        <input name="type" type="radio" value="type_1">
    </label>
    <label>
        Repeat on the :
        <input name="type" type="radio" value="type_2">
    </label>


@endsection
