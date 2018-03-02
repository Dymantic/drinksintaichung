export default {

    rememberPermissionGranted() {
        window.localStorage.setItem('location-permission', "granted");
    },

    rememberPermissionDenied() {
        window.localStorage.setItem('location-permission', "denied");
    },

    checkLocationPermission() {
        return window.localStorage.getItem('location-permission');
    },

    setLastKnownRegion(region) {
        window.localStorage.setItem('last-location-region', region)
    },

    getLastKnowRegion() {
        return window.localStorage.getItem('last-location-region');
    },

    watchUserPosition(success, failure) {
        return window.navigator.geolocation.watchPosition(success, failure);
    }


}