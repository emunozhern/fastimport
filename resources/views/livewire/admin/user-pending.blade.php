<div>
    <x-page-header title="{{ $title }}"></x-page-header>

    @if (!$showEdit)
        <div class="card filter-card" id="filter_inputs" style="display: block;">
            <div class="card-body pb-0">
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-9">
                        <div class="form-group">
                            <label>Buscar:</label>
                            <input wire:model="q" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label>Usuarios por Pag:</label>
                            <select wire:model="perPage" class="form-control">
                                <option value="10">10 por pagina</option>
                                <option value="25">25 por pagina</option>
                                <option value="50">50 por pagina</option>
                                <option value="100">100 por pagina</option>
                                <option value="1000">1000 por pagina</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1">
                        <button class="btn" wire:click="clear">Clear</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            @if ($showEdit)
                <div class="card">
                    <div class="card-body">

                        <!-- Form -->
                        <form wire:submit.prevent="submit({{ $user_id }})">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control" type="text" wire:model="name">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" wire:model="email">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" wire:model="password">
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Cedula</label>
                                <div class="row">
                                    @if ($dni_photo_url_one)
                                        <div class="col-6">
                                            <img src="{{ $dni_photo_url_one }}" width="100%">
                                        </div>
                                    @endif
                                    @if ($dni_photo_url_two)
                                        <div class="col-6">
                                            <img src="{{ $dni_photo_url_two }}" width="100%">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit">Salvar</button>
                                <button wire:click="edit()" type="button" class="btn btn-link">Cancel</button>
                            </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            @if ($users->count())
                                <table class="table table-hover table-center mb-0 datatable dataTable no-footer"
                                    id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">

                                    <thead>
                                        <tr role="row">
                                            <th style="width: 12px;">#</th>
                                            <th>Nombre</th>
                                            <th>Celular</th>
                                            <th>Email</th>
                                            <th>Patrocinador</th>
                                            <th>Registrado</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $user->id }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('admin.network_user_detail', $user->id) }}"
                                                            class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="{{ $user->profile_photo_url }}" alt="User Image">
                                                        </a>
                                                        <a href="{{ route('admin.network_user_detail', $user->id) }}">
                                                            {{ $user->name }}</a>
                                                    </h2>
                                                </td>
                                                <td>{{ $user->celular }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->parent_id }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input id="staus_{{ $user->id }}" class="check" type="checkbox"
                                                            wire:click="userStatus({{ $user->id }})"
                                                            {{ $user->is_approved ? 'checked' : '' }}>
                                                        <label for="staus_{{ $user->id }}"
                                                            class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="col-sm-12">
                                    {{ $users->links() }}
                                </div>
                            @else
                                <p> No hay resultados para la busqueda <i>{{ $q }}</i> en la pagina {{ $page }} al
                                    mostrar
                                    pagina {{ $perPage }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
