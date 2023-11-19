<div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="destroyCategory">

                    <div class="modal-body">
                        <h6>Are you Sure Delete it ?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes, Delete</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">

            <a href="{{route('category.create')}}"  class="btn btn-primary btn-sm float-right">Create</a>
            <h3 class="card-title">Category</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        Name
                    </th>
                    <th style="width: 30%">
                        Status
                    </th>

                    <th style="width: 20%">
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)

                    <tr>
                    <td>
                        #
                    </td>
                    <td>
                        <a>
                            {{$category->name}}
                        </a>
                    </td>

                    <td>
                        <span class="badge badge-success">{{$category->status}}</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="{{route('category.edit',$category->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a wire:click="deleteCategory({{$category->id}})" class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deleteModal">
                            delete
                        </a>
                    </td>
                </tr>
                @endforeach

                </tbody>

            </table>

        </div>
        {{$categories->links()}}
        <!-- /.card-body -->
    </div>

</div>

@push('script')
<script>
window.addEventListener('close',event =>{
    $('#deleteModal').modal('hide');
})

</script>
    @endpush
