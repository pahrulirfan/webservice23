@extends('master')

@section('title', 'Create Course')

@section('content')
    <div class="alert alert-info">Create Course</div>

    <div class="row">
        <div class="col-6">

            <div class="card card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('course.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Course Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                 id="name" name="name"
                                placeholder="Input Course Name" value="{{ old('name') }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Course Description</label>
                        <textarea class="form-control" id="desc" rows="2" name="description">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Course Price</label>
                        <input type="number" class="form-control" id="price" name="price"
                            placeholder="Input Course price" value="{{ old('price') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Course Institution</label>
                        <select name="institution_id" class="form-select">
                            <option value="1" {{ old('institution_id') == 1 ? 'selected' : '' }}>UBG</option>
                            <option value="2" {{ old('institution_id') == 2 ? 'selected' : '' }}>UTM</option>
                            <option value="3" {{ old('institution_id') == 3 ? 'selected' : '' }}>UNRAM</option>
                        </select>
                    </div>
                    <input type="submit" value="Save Course" class="btn btn-primary">
                    <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancel</a>
                </form>

            </div>

        </div>
    </div>
@endsection
