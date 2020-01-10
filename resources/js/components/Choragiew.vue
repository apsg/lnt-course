<template>
    <div class="row">
        <div class="col-md-7 pr-1">
            <div class="form-group">
                <label for="choragiew">Chorągiew</label>
                <select name="choragiew" id="choragiew" class="form-control">
                    <option v-for="item in items" :selected="selected == item.id" :value="item.id">{{ item.name }}
                    </option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Choragiew",
        props: {
            "selected": null
        },
        data () {
            return {
                items: [
                    {
                        id: 0,
                        name: '--'
                    }, {
                        id: 1,
                        name: 'Białostocka'
                    }, {
                        id: 2,
                        name: 'Dolnośląska'
                    }, {
                        id: 3,
                        name: 'Gdańska'
                    }, {
                        id: 4,
                        name: 'Kielecka'
                    }, {
                        id: 5,
                        name: 'Krakowska'
                    }, {
                        id: 6,
                        name: 'Kujawsko-Pomorska'
                    }, {
                        id: 7,
                        name: 'Lubelska'
                    }, {
                        id: 8,
                        name: 'Łódzka'
                    }, {
                        id: 9,
                        name: 'Mazowiecka'
                    }, {
                        id: 10,
                        name: 'Opolska'
                    }, {
                        id: 11,
                        name: 'Podkarpacka'
                    }, {
                        id: 12,
                        name: 'Stołeczna'
                    }, {
                        id: 13,
                        name: 'Śląska'
                    }, {
                        id: 14,
                        name: 'Warmińsko-Mazurska'
                    }, {
                        id: 15,
                        name: 'Wielkopolska'
                    }, {
                        id: 16,
                        name: 'Zachodniopomorska'
                    }, {
                        id: 17,
                        name: 'Ziemi Lubuskiej'
                    }
                ]
            }
        }
    }
</script>

<style scoped>

</style>
