@extends('theme::layout_adminlte.master')
@section('title') {{ $title=trans('activity::messages.activities') }}
@stop
@section('content')

@include('theme::layout_adminlte.components.bootstrap_table')

@if ($activities->isEmpty())
<h3>
    {{ trans('activity::messages.empty') }}
</h3>
@else


<table data-toggle="table" data-pagination="true" data-search="true" data-use-row-attr-func="true"
    data-reorderable-rows="false" data-locale="fa-IR"
    class="table table-hover tablesorter table-striped table-borderd text-center">
    <thead>
        <tr class="info">

            <th data-sortable="true">
                {{ trans('activity::messages.log_name') }}
            </th>

            <th data-sortable="true">
                {{ trans('activity::messages.description') }}
            </th>

            <th data-sortable="true">
                {{ trans('activity::messages.subject_id') }}
            </th>

            <th data-sortable="true">
                {{ trans('activity::messages.subject_type') }}
            </th>

            <th data-sortable="true">
                {{ trans('activity::messages.causer_id') }}
            </th>

            <th data-sortable="true">
                {{ trans('activity::messages.causer_type') }}
            </th>

            <th data-sortable="true">
                {{ trans('activity::messages.properties') }}
            </th>



            <th data-sortable="true">
                {{ trans('activity::messages.created_at') }}
            </th>

        </tr>
    </thead>
    <tbody class="filterlist">
        @foreach($activities as $activity)
        <tr>
            <td>{{$activity->log_name}}</td>
            <td>
                @if(strpos($activity->description,'::')!== false) {{trans($activity->description)}}
                @else
                {{$activity->description}} @endif
            </td>
            <td>{{$activity->subject_id}}</td>
            <td>{{$activity->subject_type}}</td>
            <td>{{$activity->causer_id}}</td>
            <td>{{$activity->causer_type}}</td>
            <td>
                @foreach($activity->properties as $key=>$property)
                {{$key.' : '.$property}}
                @endforeach
            </td>
            <td>
                @if(config('app.locale')=="fa")
                {{\Morilog\Jalali\Jalalian::forge($activity -> created_at)->format('Y-m-d')}}
                @else
                {{$activity->created_at}}
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@endsection