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
                <i class="fas fa-align-justify"></i>Category
                <a class="btn btn-success btn-sm float-end" href="{{ route('category.create') }}"> <i class="fas fa-plus"></i>Create Category</a>
                <hr>
                @if (Session()->has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session()->get('status') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

