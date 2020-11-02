<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\UpdateUserDniInformation;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UploadDniForVerification extends Component
{
    use WithFileUploads;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * The new avatar for the user.
     *
     * @var mixed
     */
    public $photo_1;
    public $photo_2;
    public $cell;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        if (Auth::user()->dni_photo_path_1 && Auth::user()->dni_photo_path_2 && Auth::user()->celular) {
            return redirect()->route('index');
        }
        $this->cell = Auth::user()->celular;

        $this->state = Auth::user()->withoutRelations()->toArray();
    }

    /**
     * Update the user's profile information.
     *
     * @param  \Laravel\Fortify\Contracts\UpdatesUserProfileInformation  $updater
     * @return void
     */
    public function updateDniInformation(UpdateUserDniInformation $updater)
    {
        $this->resetErrorBag();

        $user = User::find(Auth::user()->id);
        $user->celular = $this->cell;
        $user->save();


        $updater->update(
            Auth::user(),
            $this->photo_1
                ? array_merge($this->state, ['photo_1' => $this->photo_1, 'photo_2' => $this->photo_2])
                : $this->state
        );

        if (isset($this->photo_1)) {
            return redirect()->route('index');
        }

        // $this->emit('saved');

        // $this->emit('refresh-navigation-dropdown');
    }

    /**
     * Delete user's profile photo.
     *
     * @return void
     */
    // public function deleteProfilePhoto()
    // {
    //     Auth::user()->deleteProfilePhoto();

    //     $this->emit('refresh-navigation-dropdown');
    // }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }
    
    public function render()
    {
        return view('livewire.upload-dni-for-verification');
    }
}