
@extends('layouts.app')


@section('content')

    <div class="d-flex justify-content-end">
        <a href="{{route('categories.create')}}" class="btn btn-success float-right">Add Category</a>
    </div>

    <div class="card card-default">
        <div class="card-header bg-primary">Categories</div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <th>Name</th>
            <th>Posts Count</th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
            <th class="text-success">
                @foreach($categories as $category)
                    <tr>
                       <td>
                           <ul>
                               <li>
                                   <div class="text-success">{{$category->name}}</div>
                               </li>
                           </ul>
                       </td>
                        <td>
                            {{$category->posts->count()}}
                        </td>
                        <td>
                            <ul>
                                    <div class="text-center">
                                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-success btn-sm">Edit</a>

                                    </div>
                            </ul>
                        </td>
                        <td>
                            <form action="{{ route('categories.destroy',$category->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit"  class="btn btn-danger btn-sm" >Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </th>
            </tbody>
        </table>
        <!-- Modal -->
{{--        <div class="modal fade" id="deleteModel" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteModelLabel" aria-hidden="true">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <form action="{{route('categories.destroy',$category->id)}}" method="post" id="deleteCategoryForm">--}}

{{--                    @csrf--}}
{{--                    @method('Delete')--}}
{{--                    <div class="modal-content">--}}
{{--                        <div class="modal-header">--}}
{{--                            <h5 class="modal-title" id="staticBackdropLabel">Deleting Category</h5>--}}
{{--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body">--}}
{{--                            Do you want to delete this category ?--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>--}}
{{--                            <button type="submit" class="btn btn-danger">Yes</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            console.log('deleting',id)
            var form =document.getElementById('deleteCategoryForm')
            form.action='/categories/' + id
            $('#deleteModal').modal('show')
        }
    </script>

@endsection
