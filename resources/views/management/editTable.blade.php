<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')
            <div class="col-md-8">
                <i class="fas fa-chair"></i>Edit Table
                <hr>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('table.update', ['table' => $table->id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="tableName">Table Name</label>
                        <input type="text" class="form-control" name="name" id="tableName" placeholder="Table..." value="{{$table->name}}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


