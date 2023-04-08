<html>
<head>
</head>
<body>
<div>
    <div><a href="{{route('category.index', ['locale' => 'en'])}}">EN</a></div>
    <div><a href="{{route('category.index', ['locale' => 'ua'])}}">UA</a></div>
</div>
<div>
    <form action="{{route('category.update')}}" method="post">
        @method('PUT')
        @csrf()
        <table>
            <tr>
                <th>{{__('category.id')}}</th>
                <th>{{__('category.title')}}</th>
                <th>{{__('category.parent')}}</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><input type="text" name="category_titles[{{$category->id}}]" value="{{$category->currentTitle ?? ''}}"></td>
                    <td>{{$category->parent->currentTitle ?? ''}}</td>
                </tr>
            @endforeach
        </table>
        <input type="submit" value="{{__('category.save')}}">
    </form>
</div>
</body>
</html>
