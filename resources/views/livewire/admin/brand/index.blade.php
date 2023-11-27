<div class="card">
    @section('head-page')
        Brands
    @endsection

   @include('livewire.admin.brand.modal-form')


    <div class="card-header">
        <a href="" data-toggle="modal" data-target="#AddBrandModal" class="btn btn-primary btn-sm float-right">Create</a>
        <h3 class="card-title">Brands</h3>
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
                <th style="width: 20%">
                    Category
                </th>
                <th style="width: 30%">
                    Status
                </th>

                <th style="width: 20%">
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($brands as $brand)
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        <a>
                            {{$brand->name}}
                        </a>
                    </td>
                    <td>
                        @if($brand->category)
                            {{$brand->category->name}}
                        @else
                            No Category
                        @endif

                    </td>

                    <td>
                        @if($brand->status == 'active')
                        <span class="badge badge-success">{{$brand->status}}</span>
                        @elseif($brand->status == 'inactive')
                            <span class="badge badge-danger">{{$brand->status}}</span>
                        @endif
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="#"  wire:click="editBrand({{$brand->id}})" data-toggle="modal" data-target="#UpdateBrandModal">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a  class="btn btn-danger btn-sm" href="#" wire:click="editBrand({{$brand->id}})" data-toggle="modal" data-target="#DeleteBrandModal">
                            delete
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No Brands Found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{$brands->links()}}
    <!-- /.card-body -->
</div>

@push('script')
    <script>
        window.addEventListener('close',event =>{
            $('#AddBrandModal').modal('hide');
            $('#UpdateBrandModal').modal('hide');
            $('#DeleteBrandModal').modal('hide');

        })

    </script>
@endpush

