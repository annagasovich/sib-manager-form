@if(session()->has('message'))
    <div class="alert alert-success show" id="alert-message">
        {{ session()->get('message') }}
    </div>
@endif
<form action="/application/check" method="post">
    @csrf
    <table class="table">
        <tr>
            <th>№</th>
            <th>Тема</th>
            <th>Сообщение</th>
            <th>Имя клиента</th>
            <th>Файл</th>
            <th>Время заявки</th>
            <th>Отвечено</th>
        </tr>
        @foreach($applications as $application)
            <tr>
                <td>{{$application->id}}</td>
                <td>{{$application->subject}}</td>
                <td width="150">
                    <details>
                        <summary>Просмотреть</summary>
                        {{$application->body}}
                    </details>
                </td>
                <td>{{$application->user->name}}</td>
                <td><a href="{{($application->file)}}">Файл</a></td>
                <td>{{$application->created_at}}</td>
                <td class="text-center">
                    <input type="hidden" name="ids[{{$application->id}}]" value="active">
                    <input type="checkbox" name="checked[{{$application->id}}]" {{$application->checked ? 'checked' : ''}}>
                </td>
            </tr>
        @endforeach

    </table>

    <input type="submit" value="Сохранить" class="btn-success form-control">
</form>
<div class="m-lg-3">
    {{$applications->links()}}
</div>
