<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Ação</th>
    </tr>
    </thead>
    <tbody>
    @foreach($registers as $register)
        <tr>
            <th scope="row">{{ $register->id }}</th>
            <td>{{ $register->name }}</td>
            <td>
                {!! Form::open(['route' => ['parametercategories.destroy', $register->id], 'method' => 'delete']) !!}
                <div class='btn-group-sm'>
                    <a href="{!! route('parametercategories.edit', [$register->id]) !!}" class='btn btn-warning btn-sm'>Editar</a>
                    {!! Form::button('Deletar', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Deseja excluir este registro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>