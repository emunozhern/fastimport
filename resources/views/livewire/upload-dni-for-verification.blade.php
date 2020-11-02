<div class="col-xl-9 col-md-8">

    <form wire:submit.prevent="updateDniInformation">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Celular</label>
                    <input class="form-control" type="text" wire:model="cell">
                </div>
            </div>
        </div>
        <div class="row" x-data="{photoName: null, photoPreview: null, photoOneName: null, photoOnePreview: null}">
            <!-- Profile Photo File Input -->
            <div class="col-md-6">
                <input type="file" class="hidden" wire:model="photo_1" x-ref="photo_1" x-on:change="
                            photoOneName = $refs.photo_1.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                photoOnePreview = e.target.result;
                            };
                            reader.readAsDataURL($refs.photo_1.files[0]);
                    " />

                <x-jet-label for="photo_1" value="{{ __('Frontal Cedula') }}" />

                <!-- Current Profile Photo -->
                <div x-show="!photoOnePreview">
                    <img src="{{ $this->user->dni_photo_url_one }}" alt="{{ $this->user->name }}" width="100%">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoOnePreview">
                    <span
                        x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoOnePreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo_1.click()">
                    {{ __('Seleccionar foto') }}
                </x-jet-secondary-button>

                <x-jet-input-error for="photo_1" class="mt-2" />
            </div>


            <div class="col-md-6">
                <input type="file" class="hidden" wire:model="photo_2" x-ref="photo_2" x-on:change="
                            photoName = $refs.photo_2.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                photoPreview = e.target.result;
                            };
                            reader.readAsDataURL($refs.photo_2.files[0]);
                    " />

                <x-jet-label for="photo_2" value="{{ __('Tracera Cedula') }}" />

                <!-- Current Profile Photo -->
                <div x-show="!photoPreview">
                    <img src="{{ $this->user->dni_photo_url_two }}" alt="{{ $this->user->name }}" width="100%">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span
                        x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo_2.click()">
                    {{ __('Seleccionar foto') }}
                </x-jet-secondary-button>

                <x-jet-input-error for="photo_2" class="mt-2" />
            </div>

        </div>

        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <div class="text-center">
            <x-jet-button class="mt-5 btn btn-primary btn-lg">
                {{ __('Guardar') }}
            </x-jet-button>
        </div>
    </form>
</div>
