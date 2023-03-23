<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        @foreach($attributes as $attribute)
            <th scope="col">{{$attribute->attribute_label}}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @php
        $tempId = $values[0]->entity_id;
    @endphp
    @for($i = 0; $i < count($values); $i++)
        @if($i == 0)
            <tr>
                <td>{{$values[$i]->entity_id}}</td>
        @endif
        @if($values[$i]->entity_id != $tempId && $i != 0)
            </tr>
            <tr>
                <td>{{$values[$i]->entity_id}}</td>
            @php
                $tempId = $values[$i]->entity_id;
            @endphp
        @endif
        <td>{{$values[$i]->value}}</td>
    @endfor
    </tbody>
</table>