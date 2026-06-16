<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')
            <div class="col-md-8">
                <i class="fas fa-hamburger"></i>Edit Menu
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
                <form action="{{route('menu.update', ['menu'=>$menu->id])}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="menuName">Menu Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $menu->name }}" id="menuName" placeholder="Menu...">
                    </div>
                    <label for="menuPrice">Price</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" name="price" value="{{ $menu->price }}" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputGroupFile01" class="form-label">Image</label>
                        <input class="form-control" type="file" id="inputGroupFile01" name="image"">
                    </div>

                    <div class="form-group">
                        <label for="Description">Description</label>
                        <input type="text" name="description" class="form-control" id="Description" value="{{ $menu->description }}" placeholder="Description...">
                    </div>

                    <div class="form-group">
                        <label for="Category">Category</label>
                        <select name="category_id" class="form-control" id="">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" @selected($category->id === $menu->category_id)>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning mt-2">Edit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


