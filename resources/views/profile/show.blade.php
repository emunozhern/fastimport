<x-app-layout>
    <div class="col-xl-9 col-md-8">
        <form>
            <div class="widget">
                <h4 class="widget-title">{{ __('Profile') }}</h4>
                {{-- <div class="row">
                    <div class="col-xl-12">
                        <h5 class="form-title">{{ __('Profile Information') }}</h5>
                    </div>
                    <div class="form-group col-xl-12">
                        <div class="media align-items-center mb-3">
                            <img class="user-image" src="{{ Auth::user()->profile_photo_url }}" alt="">
                            <div class="media-body">
                                <h5 class="mb-0">Thomas Herzberg</h5>
                                <p>Max file size is 20mb</p>
                                <div class="jstinput">
                                    <a href="javascript:void(0);" class="browsephoto">Browse</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="row">

                {{-- @livewire('profile.update-profile-information-form')
                --}}



                <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Email</label>
                    <input class="form-control" type="email" value="truelysell@example.com" readonly="">
                </div>
                <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Country Code</label>
                    <input class="form-control" type="text" value="+1" readonly="">
                </div>
                <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Mobile Number</label>
                    <input class="form-control no_only" type="text" value="412-355-7471" readonly="" required="">
                </div>
                <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Date of birth</label>
                    <input type="text" class="form-control provider_datepicker" autocomplete="off" value="17-01-1996">
                </div>
                <div class="col-xl-12">
                    <h5 class="form-title">Service Info</h5>
                </div>
                <div class="form-group col-xl-6">
                    <label class="mr-sm-2">What Service do you Provide?</label>
                    <select class="form-control select provider_category" title="Category">
                        <option>Automobile</option>
                        <option>Construction</option>
                        <option>Interior</option>
                        <option>Cleaning</option>
                        <option>Electrical</option>
                        <option>Carpentry</option>
                        <option>Computer</option>
                    </select>
                </div>
                <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Sub Category</label>
                    <select class="form-control select provider_subcategory" title="Sub Category">
                        <option>House Cleaning</option>
                        <option>Full Car Wash</option>
                        <option>Roofing</option>
                        <option>Indoor Glass</option>
                        <option>Convertible Fridge</option>
                        <option>Fridge</option>
                        <option>Car Wash</option>
                        <option>Others</option>
                    </select>
                </div>
                <div class="col-xl-12">
                    <h5 class="form-title">Address</h5>
                </div>
                <div class="form-group col-xl-12">
                    <label class="mr-sm-2">Address</label>
                    <input type="text" class="form-control"
                        style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                </div>
                <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Country</label>
                    <select class="form-control">
                        <option>Select Country</option>
                        <option>Australia (+61)</option>
                        <option>France (+33)</option>
                        <option>Germany (+49)</option>
                        <option>Iceland (+354)</option>
                        <option>India (+91)</option>
                        <option>Romania (+40)</option>
                        <option>Russia (+7)</option>
                        <option>Spain (+34)</option>
                        <option>UK (+44)</option>
                        <option selected="">USA (+1)</option>
                    </select>
                </div>
                <div class="form-group col-xl-6">
                    <label class="mr-sm-2">State</label>
                    <select class="form-control"></select>
                </div>
                <div class="form-group col-xl-6">
                    <label class="mr-sm-2">City</label>
                    <select class="form-control"></select>
                </div>
                <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Postal Code</label>
                    <input type="text" class="form-control" value="654587">
                </div>
                <div class="form-group col-xl-12">
                    <button class="btn btn-primary pl-5 pr-5" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
