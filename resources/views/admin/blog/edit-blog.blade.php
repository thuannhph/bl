<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <label for="">Tiêu đề bài viết</label><br>
    <input type="text" name="title" value="{{$blog->title}}" placeholder="tieu de bai viet"><br>
    @error('title')
        <span class="text-danger">{{$message}}</span>
    @enderror
    <label for="">Nội dung</label><br>
    <textarea name="content">{{$blog->content}}</textarea><br>
    @error('content')
        <span class="text-danger">{{$message}}</span>
    @enderror
    <label for="">Ảnh</label><br>
    <input type="file" name="image" ><br>
    @error('image')
        <span class="text-danger">{{$message}}</span>
    @enderror
    <label for="">danh mục</label><br>
    <select name="cate_id" id="">
        @foreach($category as $c)
            <option value="{{$c->id}}" {{$c->id== $blog->cate_id ? 'selected' : ''}} >{{$c->name}}</option>
        @endforeach                
    </select><br>
    <button type="submit">Đăng bài</button>
</form>