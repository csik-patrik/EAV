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
    <tr>
        @foreach($values as $value)
            <th scope="col">{{$value->entity_id}}</th>
        @endforeach

    </tr>
    <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
    </tr>
    </tbody>
</table>