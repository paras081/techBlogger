@extends('layouts.main')

@section('content')

    <form action="{{ route('storePost') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <select class="form-select mb-4" name="userName" aria-label="Default select example">
            <option selected>Select User(Author) Name</option>
            <option value="1">Admin</option>
            <option value="2">Paras</option>
            <option value="3">Ravi</option>
            <option value="4">Ankit</option>
            <option value="5">Dhaval</option>
        </select>
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="form6Example1" name="title" class="form-control" />
                    <label class="form-label" for="form6Example1">Title</label>
                </div>
            </div>
        </div>
        <select class="form-select mb-4" name="category" aria-label="Default select example">
            <option selected>Select Category</option>
            <option value="Computer Fundamentals">Computer Fundamentals</option>
            <option value="C Language">C Language</option>
            <option value="C++ Language">C++ Language</option>
            <option value="HTML">HTML</option>
            <option value="CSS">CSS</option>

        </select>
        <div class="form-outline mb-4">
            <textarea class="form-control" id="form6Example7" name="description" rows="10"></textarea>
            <label class="form-label" for="form6Example7">Description</label>
        </div>

        <label class="form-label" for="customFile">Post Image</label>
        <input type="file" class="form-control mb-3" name="imgUrl" id="customFile" />

        <label class="form-label" for="customFile">Select Tags</label>
        <div class="row">
            <div class="row-sm-6">
                <input type="checkbox" class="btn-check" id="btn-check" autocomplete="off" />
                <label class="btn btn-outline-primary btn-rounded btn-sm mb-4" name="tags[]" value="webTag" for="btn-check">Web</label>

                <input type="checkbox" class="btn-check" id="btn-check2" name="tags[]" value="languageTag" autocomplete="off" />
                <label class="btn btn-outline-secondary btn-rounded btn-sm mb-4"  for="btn-check2">Languages</label>

                <input type="checkbox" class="btn-check" id="btn-check3" name="tags[]" value="mobileTag" autocomplete="off" />
                <label class="btn btn-outline-success btn-rounded btn-sm mb-4"  for="btn-check3">Mobile</label>
            </div>
            <div class="row-sm-6">
                <input type="checkbox" class="btn-check" id="btn-check4" name="tags[]" value="embeddedTag" autocomplete="off" />
                <label class="btn btn-outline-danger btn-rounded btn-sm mb-4"  for="btn-check4">Embedded</label>

                <input type="checkbox" class="btn-check" id="btn-check5" name="tags[]" value="arduinoTag" autocomplete="off" />
                <label class="btn btn-outline-warning btn-rounded btn-sm mb-4"  for="btn-check5">Arduino</label>

                <input type="checkbox" class="btn-check" id="btn-check6" name="tags[]" value="hardwareTag" autocomplete="off" />
                <label class="btn btn-outline-info btn-rounded btn-sm mb-4"  for="btn-check6">Hardware</label>
            </div>
        </div>


        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Post</button>
    </form>
@endsection
