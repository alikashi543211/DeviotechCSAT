<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Care Start Date</th>
            <th>Client Name</th>
            <th>DOB</th>
            <th>Type</th>
            <th>Condition</th>
            <th>County</th>
            <th>Locality</th>
            <th>Eircode</th>
            <th>Link</th>
            <th>CareManager</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($clients as $item)
       <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{date('d-m-Y',strtotime($item->care_start_date))}}</td>
        <td>{{$item->name ?? ""}}</td>
        <td>{{$item->dob?date('d-m-Y',strtotime($item->dob)):''}}</td>
        <td>{{$item->type ?? ""}}</td>
        <td>{{$item->condition ?? ""}}</td>
        <td>{{$item->county ?? ""}}</td>
        <td>{{$item->locality ?? ""}}</td>
        <td>{{$item->eircode ?? ""}}</td>
        <td>{{route('client.form.link')}}?client=
            {{$item->name.'&care_m='}}{{$item->care_manager_id.'&c='}}{{$item->id}}
        </td>
        <td>{{$item->care_manager ?? ""}}</td>
    </tr>
    @endforeach
</tbody>
</table>