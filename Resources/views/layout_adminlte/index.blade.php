@extends('theme::layout_adminlte.master')
@section('title') {{ $title=trans('activity::messages.activites') }}
@stop
@section('content')

@include('theme::layout_adminlte.components.bootstrap_table')

@if ($activities->isEmpty())
<h3>
    {{ trans('activity::messages.empty') }}
</h3>
@else


<table data-toggle="table" data-pagination="true" data-search="true" data-use-row-attr-func="true"
    data-reorderable-rows="true" data-locale="fa-IR"
    class="table table-hover tablesorter table-striped table-borderd text-center">
    <thead>
        <tr class="info">

            <th>
                {{ trans('activity::messages.log_name') }}
            </th>

            <th>
                {{ trans('activity::messages.description') }}
            </th>

            <th>
                {{ trans('activity::messages.subject_id') }}
            </th>

            <th>
                {{ trans('activity::messages.subject_type') }}
            </th>

            <th>
                {{ trans('activity::messages.causer_id') }}
            </th>

            <th>
                {{ trans('activity::messages.causer_type') }}
            </th>

            <th>
                {{ trans('activity::messages.properties') }}
            </th>



            <th>
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
                {{\Morilog\Jalali\Jalalian::forge($activity -> created_at)->format('%d %B, %Y')}}
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