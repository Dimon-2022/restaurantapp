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
                <i class="fas fa-hamburger"></i>Create Menu
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
                <form action="{{route('menu.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="menuName">Menu Name</label>
                        <input type="text" class="form-control" name="name" id="menuName" placeholder="Menu...">
                    </div>
                    <label for="menuPrice">Price</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" name="price" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputGroupFile01" class="form-label">Image</label>
                        <input class="form-control" type="file" id="inputGroupFile01" name="image">
                    </div>

                    <div class="form-group">
                        <label for="Description">Description</label>
                        <input type="text" name="description" class="form-control" id="Description" placeholder="Description...">
                    </div>

                    <div class="form-group">
                        <label for="Category">Category</label>
                        <select name="category_id" class="form-control" id="">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


