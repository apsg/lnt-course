<template>
    <div>
        <a :href="'/kursy/'+ data.id" class="btn btn-green">
            <i class="fa fa-eye"></i>
            Zobacz
        </a>
    </div>
</template>

<script>
    export default {
        props: {
            data: {},
        },
    }
</script>

<style scoped>

</style>
