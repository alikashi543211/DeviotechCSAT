@foreach($localities as $locality)
    <option value="{{$locality->locality}}">{{$locality->locality}}</option>
    @endforeach
