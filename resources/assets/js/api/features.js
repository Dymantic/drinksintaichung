export default {

    getFeatures(cb) {
        axios.get('/api/features')
             .then(({data}) => cb(data.map(feature => ({
                 id: feature.id,
                 name: feature.label,
                 icon_name: feature.short_name,
                 selected: false,
                 icon: feature.icon
             }))))
             .catch(err => console.log(err));
    }
}