<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')
            <div class="col-md-8">
                <i class="fas fa-chair"></i>Table
                <a class="btn btn-success btn-sm float-end" href="{{ route('table.create') }}"> <i class="fas fa-plus"></i>Create a Table</a>
                <hr>
                @if (Session()->has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session()->get('status') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Table</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tables as $table)
                            <tr>
                                <td>{{ $table->id }}</td>
                                <td>{{ $table->name }}</td>
                                <td>{{ $table->status }}</td>
                                <td>
                                    <a href="{{ route('table.edit', ['table' => $table->id]) }}" class="btn btn-warning">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('table.destroy', ['table'=> $table->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

