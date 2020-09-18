<template>

    <ul class="pagination right" v-if="!client">
        <span class="page-stats">{{pagination.from}} - {{pagination.to}} de {{pagination.total}}</span>

        <a v-if="pagination.prevPageUrl" class="btn-flat" @click="$emit('prev');">
            <i class="material-icons ">navigate_before</i>
        </a>
        <a class="btn-flat" v-else :disabled="true">
            <i class="material-icons ">navigate_before</i>
        </a>

        <a v-if="pagination.nextPageUrl" class="btn-flat" @click="$emit('next');">
            <i class="material-icons ">navigate_next</i>
        </a>
        <a class="btn-flat" v-else :disabled="true">
            <i class="material-icons ">navigate_next</i>
        </a>
    </ul>

    <nav  v-else>
        <span class="page-stats">
            {{pagination.from}} - {{pagination.to}} de {{filtered.length}}
            <span v-if="filtered.length < pagination.total">(filtered from {{pagination.total}} total entries)</span>
        </span>
        <button v-if="pagination.prevPage" class="button is-small pagination-previous" @click="$emit('prev');">
            Prev
        </button>
        <a class="button is-small pagination-previous" v-else :disabled="true">
           Prev
       </a>

       <button v-if="pagination.nextPage" class="button is-small pagination-next" @click="$emit('next');">
        Next
    </button>
    <a class="button is-small pagination-next" v-else :disabled="true">
        Next
    </a>
</nav>
</template>

<script>
export default {
    props: ['pagination', 'client', 'filtered']
}
</script>