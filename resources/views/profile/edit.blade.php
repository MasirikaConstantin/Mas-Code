<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-body-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-body shadow sm:rounded-lg">
                <div class="max-w-xl bg-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>


            <div class="p-4 sm:p-8 bg-body shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.picture')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-body shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-body shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('fileUpload').addEventListener('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imageDiv').src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        });
        </script>
        <script>
        document.getElementById('fileUpload').addEventListener('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                document.getElementById('imageDiv').appendChild(img);
            }
            reader.readAsDataURL(this.files[0]);
        });
        </script>
</x-app-layout>
