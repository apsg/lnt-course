<template>
    <div class="row">
        <div class="col-md-7 pr-1">
            <div class="form-group">
                <label for="stopien">Stopień</label>
                <select name="stopien" id="stopien" class="form-control">
                    <option v-for="item in items" :selected="selected == item.id" :value="item.id">{{ item.name }}
                    </option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Stopien",

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
                        name: 'pwd.',
                    }, {
                        id: 2,
                        name: 'phm.',
                    }, {
                        id: 3,
                        name: 'hm.',
                    },
                ]
            }
        }
    }
</script>

<style scoped>

</style>
