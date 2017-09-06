@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    @if(Session::has('deleted_pic'))

        <p class="alert-danger">{{session('deleted_pic')}}</p>

    @endif

    @if($photos)

        <form action="/admin/media/delete" method="post" class="form-inline">

            {{csrf_field()}}

            <div class="form-group">
                <select style="display: none" name="checkboxArray" id="" class="form-control">
                    <option value="">Delete</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" name="delete_selected" value="Delete Selected" class="btn-primary">
            </div>

        <table class="table">
            <thead>
            <tr>
                <th><input type="checkbox" id="options"></th>
                <th>ID</th>
                <th>Image</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>

            @foreach($photos as $photo)

                <tr>
                    <td><input class="checkboxs" type="checkbox" name="checkboxArray[]" value="{{$photo->id}}" id=""></td>
                    <td>{{$photo->id}}</td>
                    <td><img height="50"  src="{{$photo->file}}" class="img-rounded"></td>
                    <td>{{$photo->created_at}}</td>
                    <td>
                        <input class="" type="hidden" name="fil" value="{{$photo->id}}" id="">
                        <div class="form-group">
                            <input type="submit" value="Delete" name="delete_single" class="btn btn-danger">
                        </div>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>

        </form>
    @endif
@endsection

@section('scripts')

    {{-- checklist for pics --}}
    <script>

        $(document).ready(function () {

            $('#options').click(function () {

                if(this.checked){

                    $('.checkboxs').each(function () {

                        this.checked = true;

                    });
                } else{

                    $('.checkboxs').each(function () {

                        this.checked = false;

                    });
                }

            });

        });

    </script>

@endsection