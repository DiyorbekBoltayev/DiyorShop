@extends('admin.main')
@section('contents')
<div class="card-header">
        <div class="d-flex justify-content-between">
            <div class="">
                <h2 class="text text-dark">Yangi kategoriya qo'shish</h2>
            </div>
            <div class="">
                <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Kategoriyalarga qaytish</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.categories.store')}}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Kategoriya nomi</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="parent_id">Parent</label>
                <select name="parent_id" id="parent_id" class="form-control">
                    <option value="">-- Yo'q --</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Saqlash</button>
            </div>
        </form>
    </div>
@endsection
