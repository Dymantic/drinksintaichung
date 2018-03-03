<modal v-cloak :show="showNotificationModal">
    <div slot="body" class="flex flex-col justify-center items-center px-4 py-8">
        <p class="text-2xl font-bold text-dit-red mb-8">@{{ notification.title }}</p>
        <p class="text-grey-dark text-xs mb-8 leading-normal">@{{ notification.body }}</p>
        <button @click="showNotificationModal = false" class="bg-dit-red text-dit-cream font-bold text-xs px-4 py-2 rounded shadow">Got it!</button>
    </div>
</modal>
<location-permission :get-location-permission="open_location_modal"
                     @permission-done="open_location_modal = false"
                     v-cloak
></location-permission>