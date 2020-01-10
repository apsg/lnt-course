<template>
    <div class="row">
        <div class="col-md-7 pr-1">
            <div class="form-group">
                <label for="okk">OKK</label>
                <select name="okk" id="okk" class="form-control">
                    <option v-for="item in items" :selected="selected == item.id" :value="item.id">{{ item.name }}
                    </option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "OKK",

        props: {
            selected: null
        },

        data () {
            return {
                items: [
                    {
                        id: 0,
                        name: 'Brak',
                    }, {
                        id: 1,
                        name: 'BOKK',
                    }, {
                        id: 2,
                        name: 'SOKK',
                    }, {
                        id: 3,
                        name: 'ZOKK',
                    },
                ]
            }
        }
    }
</script>

<style scoped>

</style>
