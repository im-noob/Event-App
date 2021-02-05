@extends('parent')
@section('content')
    <H1>Add Event</H1>
    <div class="row">
        <div class="col-sm-8">
            <form method="post" action="{{route('event.store')}}" class="row g-3">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Event Title</label>
                    <input name="name" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input name="start_date" type="date" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input name="end_date" type="date" class="form-control">
                </div>

                <br>
                Recurrence:
                <label></label>
                <div class="row">
                    <div class="col-sm-3">
                        Repeat:
                        <input name="type" type="radio" value="type_1">
                    </div>
                    <div class="col-sm-2">
                        <input type="hidden" name="type_1_occ_type_1" value="0">
                        <select class="form-select"
                                id="lstRepeatType"
                                name="type_1_occ_type_2" >
                            <option selected="selected" value="1">Every</option>
                            <option value="2">Every Other</option>
                            <option value="3">Every Third</option>
                            <option value="4">Every Fourth</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select class="form-select"
                                id="type_1_occ_type_3" name="type_1_occ_type_3" >
                            <option selected="selected" value="1">Day</option>
                            <option value="2">Week</option>
                            <option value="3">Month</option>
                            <option value="4">Year</option>
                        </select>
                    </div>
                </div>



                <br>
                <label>

                    <div class="row">
                        <div class="col-sm-3">
                            Repeat on the :
                            <input name="type" type="radio" value="type_2">
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select"
                                    id="lstRepeatOn" name="type_2_occ_type_1" >
                                <option selected="selected" value="1">First</option>
                                <option value="2">Second</option>
                                <option value="3">Third</option>
                                <option value="4">Fourth</option>
                            </select>
                            </span>&nbsp;

                        </div>
                        <div class="col-sm-2">
                            <select class="form-select"
                                    id="lstRepeatWeek" name="type_2_occ_type_2"
                            >
                                <option selected="selected" value="0">Sun</option>
                                <option value="1">Mon</option>
                                <option value="2">Tue</option>
                                <option value="3">Wed</option>
                                <option value="4">Thu</option>
                                <option value="5">Fri</option>
                                <option value="6">Sat</option>
                            </select>


                        </div>
                        of the
                        <div class="col-sm-2">
                           <select class="form-select"
                                    id="lstRepeatMonth" language="javascript" name="type_2_occ_type_3"
                            >
                                <option selected="selected" value="1">Month</option>
                                <option value="3">3 Months</option>
                                <option value="4">4 Months</option>
                                <option value="6">6 Months</option>
                                <option value="12">Year</option>
                            </select>
                        </div>
                    </div>
                </label>
                <br>
                <input type="submit" class="btn btn-primary mb-3">
            </form>

        </div>
    </div>
@endsection
