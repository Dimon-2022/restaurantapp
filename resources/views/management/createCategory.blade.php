<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="/management/category" class="list-group-item list-group-item-action">
                        <i class="fas fa-align-justify"></i>
                        Category
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-hamburger"></i>
                        Menu
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-chair"></i>
                        Table
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-users-cog"></i>
                        User
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                <i class="fas fa-align-justify"></i>Create Category
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
                <form action="{{route('category.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" class="form-control" name="name" id="categoryName" placeholder="Category...">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


