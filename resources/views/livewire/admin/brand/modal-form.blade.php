<!-- Create Modal -->
<div  wire:ignore.self class="modal fade" id="AddBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Brand</h5>
                <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="storeBrand()">
                <div class="modal-body">

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" wire:model.defer="name" class="form-control">
                        @error('name') <em class="alert-danger">{{$message}}</em> @enderror

                    </div>

                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" wire:model.defer="slug" class="form-control">
                        @error('slug') <em class="alert-danger">{{$message}}</em> @enderror

                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select wire:model.defer="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status') <em class="alert-danger">{{ $message }}</em> @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Update Modal -->
<div  wire:ignore.self class="modal fade" id="UpdateBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div wire:loading class="p-2">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="updateBrand()">
                    <div class="modal-body">


                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name') <em class="alert-danger">{{$message}}</em> @enderror

                        </div>

                        <div class="mb-3">
                            <label>Slug</label>
                            <input type="text" wire:model.defer="slug" class="form-control">
                            @error('slug') <em class="alert-danger">{{$message}}</em> @enderror

                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <select wire:model.defer="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            @error('status') <em class="alert-danger">{{ $message }}</em> @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Delete Modal -->
<div  wire:ignore.self class="modal fade" id="DeleteBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Brand</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div wire:loading class="p-2">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="destroyBrand()">
                    <div class="modal-body">

                        <h4>Are you Sure For delete brand ?</h4>

                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
