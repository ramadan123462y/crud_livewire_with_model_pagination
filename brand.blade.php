<div>
    <section class="section">
        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">

                        <div class="row  justify-content-between">



                            <h5 class="card-title  col-4 text"> Brands</h5>
                            <div class="col-2 align-self-center ">

                                <button type="button" class="btn btn-outline-info col-8 " data-bs-toggle="modal"
                                    data-bs-target="#storemodel">Add Brand </button>
                            </div>
                        </div>

                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Process</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($prands as $prand)
                                    <tr>

                                        <th scope="row">{{ $prand->id }}</th>
                                        <td>{{ $prand->name }}</td>
                                        <td>{{ $prand->slug }}</td>

                                        <td>
                                            @if ($prand->status == true)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Un Active</span>
                                            @endif

                                        </td>
                                        <td class="fw-bold">
                                            <button type="button" id="myButton2"
                                                wire:click="delete({{ $prand->id }})"
                                                class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>

                                            <button type="button" class="btn btn-outline-warning"
                                                wire:click="editbrand({{ $prand->id }})" data-bs-toggle="modal"
                                                data-bs-target="#editmodel"><i
                                                    class="bi bi-calendar2-check"></i></button>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div>
                            {{ $prands->links() }}
                        </div>
                    </div>

                </div>
            </div><!-- End Recent Sales -->

        </div>

        {{-- model add --}}
        <div class="modal fade" wire:ignore.self id="storemodel" tabindex="-1" aria-labelledby="storemodel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">



                    <h5 class="modal-title" id="storemodel">Add  Brand</h5>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" wire:model.defer="name" name="name"
                                id="recipient-name">
                            <x-inline-validation name="name"></x-inline-validation>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Slug:</label>
                            <input type="text" class="form-control" wire:model.defer="slug" name="slug"
                                id="recipient-name">
                            <x-inline-validation name="slug"></x-inline-validation>
                        </div>
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch
                                Status</label>
                            <input class="form-check-input" type="checkbox"wire:model.defer="status"
                                id="flexSwitchCheckChecked">
                        </div>


                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Brand</button>
                </div>
                </form>
            </div>
        </div>
    </div>
        {{-- edit model  --}}
        <div class="modal fade" wire:ignore.self id="editmodel" tabindex="-1" aria-labelledby="editmodel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">



                        <h5 class="modal-title" id="editmodel">Edit Brand</h5>


                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="updatebrand">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" wire:model.defer="name" name="name"
                                    id="recipient-name">
                                <x-inline-validation name="name"></x-inline-validation>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Slug:</label>
                                <input type="text" class="form-control" wire:model.defer="slug" name="slug"
                                    id="recipient-name">
                                <x-inline-validation name="slug"></x-inline-validation>
                            </div>
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch
                                    Status</label>
                                <input class="form-check-input" type="checkbox"wire:model.defer="status"
                                    id="flexSwitchCheckChecked">
                            </div>


                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit Brand</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- end model add --}}
    </section>
</div>
