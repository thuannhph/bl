<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
</head>
<body>
    <header>
        <button><a href="{{route('blog.add')}}">đăng bài</a></button>
        <div class="header">
            <h2 style="text-align:center">Tin tức trong ngày</h2>
        </div>
    </header>
    <div class="content">
        @foreach($blogs as $b)
            <h4>{{$b->title}}</h4>
            <p>{{$b->content}}</p>
            <img src="{{asset('storage/'. $b->image)}}" width="70" /><br>
            <p>{{$b->updated_at}}</p>
            <a href="{{route('blog.edit',['id'=>$b->id])}}">sửa</a>
            <a href="{{route('blog.remove',['id'=>$b->id])}}">xóa</a>
            <hr>
        @endforeach
    </div>
    <footer>
        <div class="footer">
            {{-- <h2 style="text-align:center">Thông tin liên hệ quảng cáo</h2> --}}
        </div>
    </footer>
</body>
</html>