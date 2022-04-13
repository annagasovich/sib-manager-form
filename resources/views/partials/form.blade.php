@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/application/send" method="post" enctype="multipart/form-data">
    @csrf
    <input name="subject" type="text" class="form-control" placeholder="Тема" value="{{ old('subject') }}">
    <textarea name="body" id="" cols="30" rows="10" class="form-control" placeholder="Сообщение" value="{{ old('body') }}"></textarea>
    <input name="file" type="file" class="form-control">
    <input type="submit" class="form-control btn-success" value="Отправить">
</form>
