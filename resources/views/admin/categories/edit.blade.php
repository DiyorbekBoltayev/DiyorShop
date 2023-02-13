@extends('admin.main')
@section('contents')
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div class="">
                <h2 class="text text-dark">Kategoriyani tahrirlash</h2>
            </div>
            <div class="">
                <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Kategoriyalarga qaytish</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.categories.update',$category->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">Kategoriya nomi</label>
                <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="parent_id">Parent</label>
                <select name="parent_id" id="parent_id" class="form-control">
                    <option value="">-- Yo'q --</option>
                    @foreach ($categories as $category1)
                        @if($category->id == $category1->id) @continue @endif
                        @if($category1->id == $category->parent_id)
                            <option selected value="{{$category1->id}}">{{$category1->name}}</option>
                        @else
                        <option value="{{$category1->id}}">{{$category1->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Saqlash</button>
            </div>
        </form>
    </div>
@endsection
