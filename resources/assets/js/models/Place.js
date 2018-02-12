import geolib from 'geolib';

export default class Place {

    constructor(place_attributes) {
        this.features = place_attributes.feature_list || [];

        this.id = place_attributes.id;
        this.name = place_attributes.name;
        this.type = place_attributes.type;
        this.description = place_attributes.description;
        this.address = place_attributes.address;
        this.zh_address = place_attributes.zh_address;
        this.location = place_attributes.location;
        this.distance = null;
    }

    matchesFilterList(filter_list) {
        return filter_list.every(attribute => this.features[attribute.icon_name]);
    }

    distanceTo(place) {
        return geolib.getDistance(this.location, place);
    }

    setDistance(place) {
        this.distance = geolib.getDistance(this.location, place);
    }

    latLng() {
        return {lat: this.location.latitude, lng: this.location.longitude};
    }
}