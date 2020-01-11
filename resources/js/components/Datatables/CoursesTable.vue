<template>
    <data-table
        :columns="columns"
        url="/dt/course"
        order-by="starts_at"
        :filters="filters"
    >
        <div slot="filters" slot-scope="{ tableData, perPage }">
            <div class="row mb-2">
                <div class="col-md-4">
                    Pokazuj:
                    <select class="form-control" v-model="tableData.length">
                        <option :key="page" v-for="page in perPage">{{ page }}</option>
                    </select>
                </div>
                <div class="col-md-4">
                    Lokalizacja (chorągiew):
                    <choragiew :label="false" v-model="filters.choragiew"></choragiew>
                </div>
                <div class="col-md-4">
                    Typ:
                    <select v-model="filters.type" class="form-control">
                        <option value="" selected="selected">Wszystkie</option>
                        <option value="1">Adeptów</option>
                        <option value="2">Trenerski</option>
                        <option value="3">Master Educator</option>
                    </select>
                </div>
            </div>
        </div>
    </data-table>
</template>

<script>
    export default {
        name: "CoursesTable",

        data () {
            return {

                filters: {
                    choragiew: null,
                    starts_at: 'ASC'
                },

                columns: [
                    {
                        label: 'Nazwa',
                        name: 'title',
                        orderable: true,
                    }, {
                        label: 'Typ',
                        name: 'type_string',
                        orderable: false,
                    }, {
                        label: 'Termin',
                        name: 'term',
                        orderable: true,
                    }, {
                        label: 'Organizator',
                        name: 'user.name',
                        orderable: false,
                    },
                ]
            };
        }
    }
</script>

<style scoped>

</style>
