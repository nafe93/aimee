<spark-profile :user="user" inline-template>
    <div>
        <!-- Update Profile Photo -->
        @include('spark::settings.profile.update-profile-photo')

        <!-- Update Contact Information -->
        @include('spark::settings.profile.update-contact-information')

        <!-- Update Profile Language -->
        {{--@include('settings.profile.update-profile-language')--}}

        <!-- Delete Account -->
        @include('settings.profile.delete-account')

    </div>
</spark-profile>
