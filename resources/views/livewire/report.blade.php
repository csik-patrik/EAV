<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <!-- List of selected attributes as table headers -->
        @foreach($attributes as $attribute)
            <th scope="col">{{$attribute->attribute_label}}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @php
        $tempId = $values[0]->entity_id;
        $actColIndex = -1;
    @endphp
    @for($i = 0; $i < count($values); $i++)
        @if($i == 0)
            <tr>
                <td>{{$values[$i]->entity_id}}</td>
        @endif
        @if($values[$i]->entity_id != $tempId && $i != 0)
            </tr>
            @php
                $actColIndex = -1;
            @endphp
            <tr>
                <td>{{$values[$i]->entity_id}}</td>
            @php
                $tempId = $values[$i]->entity_id;
            @endphp
        @endif
        @php
            $actColIndex++;
        @endphp
            <!-- Moving to the correct column -->
            @while($attributes->has($actColIndex) &&  $values[$i]->attribute_id != $attributes[$actColIndex]->id)
                @php
                    $actColIndex++;
                @endphp
                <td></td>
            @endwhile
            <td>{{$values[$i]->value}}</td>
    @endfor
    </tbody>
</table>