<topclients-component
    :lang = "{{ json_encode(\App::getLocale()) }}"
    :words_featured = "{{ json_encode(__('words.featured')) }}" 
    :words_views = "{{ json_encode(__('words.views')) }}"
    :words_hospitals = "{{ json_encode(__('words.hospitals')) }}"
    :words_pharmacies = "{{ json_encode(__('words.pharmacies')) }}"
    :words_clinics = "{{ json_encode(__('words.clinics')) }}"
    :words_cosmetics = "{{ json_encode(__('words.cosmetics')) }}">
</topclients-component>