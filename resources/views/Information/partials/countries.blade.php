@foreach( App\Country::all()  as $country )
    <option value="{{$country -> id}}">@lang('countries.' . $country -> name )</option>
@endforeach