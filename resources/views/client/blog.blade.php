<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <style>
        .menu_ul{
            justify-content: space-around;
            flex-wrap: wrap;
            align-content: space-around;
        }
        a{
            text-decoration: none;
        }
        .category{
            display: inline-block;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <header>
        <button><a href="{{route('blog.add')}}">đăng bài</a></button>
        <div class="header">
            <h2 style="text-align:center">Tin tức trong ngày</h2>
        </div>
        <div>
            <div class="menu">
                <ul class="menu_ul">
                    <li class="category"><a href="{{route('blog.list')}}">Tất cả</a></li>
                    @foreach($category as $cate)
                    <li class="category"><a href="{{route('cate.search', ['id'=>$cate->id])}}">{{$cate->name}}</a></li>
                    @endforeach
                </ul>
            </div>
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