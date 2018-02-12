import Place from "../../models/Place";

export default [
    new Place({
        name: "Salut",
        type: "Pizza Restaurant and Bar",
        description: "Cosy little place just south of the border.",
        address: "23 Daye rd, Taichung City",
        zh_address: "23 Daye rd, Taichung City in Chinese",
        location: {
            latitude: 24.1530166,
            longitude: 120.6518744
        },
        beer: true,
        craft_beer: false,
        wine: false,
        cocktails: true,
        date_friendly: true,
        night_view: false,
        open_late: false,
        sports: true,
        food: true,
        live_music: true,
        price_fair: true,
        price_moderate: true,
        price_expensive: true,
        outdoor_seating: true
    }),
    new Place({
        name: "One Hotel Bar",
        type: "Hotel Bar",
        description: "Classy place.",
        address: "25 Daye rd, Taichung City",
        zh_address: "25 Daye rd, Taichung City in Chinese",
        location: {
            latitude: 24.149939,
            longitude: 120.6629913
        },
        beer: true,
        craft_beer: true,
        wine: true,
        cocktails: true,
        date_friendly: true,
        night_view: true,
        open_late: true,
        sports: false,
        food: true,
        live_music: true,
        price_fair: false,
        price_moderate: false,
        price_expensive: true,
        outdoor_seating: false
    }),
    new Place({
        name: "Britainia",
        type: "Pub",
        description: "Last stronghold of the empire.",
        address: "27 Daye rd, Taichung City",
        zh_address: "27 Daye rd, Taichung City in Chinese",
        location: {
            latitude: 24.157312,
            longitude: 120.6556813
        },
        beer: true,
        craft_beer: false,
        wine: true,
        cocktails: true,
        date_friendly: false,
        night_view: false,
        open_late: true,
        sports: true,
        food: false,
        live_music: false,
        price_fair: true,
        price_moderate: true,
        price_expensive: false,
        outdoor_seating: true
    })
]