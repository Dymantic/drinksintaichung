import Place from "../models/Place";

export default {

    getPlaces(cb) {
        axios.get('/api/establishments')
            .then(({data}) => cb(data.map(place => new Place(place))))
            .catch(err => console.log(err));
    }
}