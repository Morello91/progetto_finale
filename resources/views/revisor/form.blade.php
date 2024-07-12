<x-layout>

    <div class="container pb-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-4 pt-5 mb-5">{{__('revisor.title')}}</h1>
            </div>
            <div class="row justify-content-center align-items-center height-custom">
                <div class="col-12 col-md-6">
                    <p class="mb-4 fs-4">{{__('revisor.desc_NewRev')}}</p>
                    <div class="col-4 offset-4 mt-5"> 
                        <button  class="primary-button w-100"><a href="{{ route('become.revisor') }}" class="text-white">{{ __('ui.btn_revisor') }}</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>